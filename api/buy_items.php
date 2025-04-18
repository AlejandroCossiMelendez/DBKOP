<?php
session_start();
include("../include.inc.php");

header('Content-Type: application/json');
$db = new SQL();

// Validación de sesión
if (!isset($_SESSION['account'])) {
    echo json_encode(["success" => false, "message" => "Sesión expirada o no autenticada."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['items']) || !is_array($data['items']) || empty($data['items'])) {
    echo json_encode(["success" => false, "message" => "Items no recibidos correctamente."]);
    exit;
}

$account_id = (int) $_SESSION['account'];
$character_id = (int) $data['character_id'];
$item_ids = array_map('intval', $data['items']);

// Validar personaje
$db->myQuery("SELECT name, id FROM players WHERE id = $character_id AND account_id = $account_id LIMIT 1");
if ($db->num_rows() == 0) {
    echo json_encode(["success" => false, "message" => "Personaje inválido o no pertenece a tu cuenta."]);
    exit;
}
$player = $db->fetch_array();
$player_name = $player['name'];
$player_id = $player['id'];

// Puntos del usuario
$db->myQuery("SELECT premium_points FROM accounts WHERE id = $account_id LIMIT 1");
if ($db->num_rows() == 0) {
    echo json_encode(["success" => false, "message" => "No se pudieron obtener tus puntos."]);
    exit;
}
$account = $db->fetch_array();
$user_points = (int) $account['premium_points'];

// Obtener info de los ítems
$ids_str = implode(',', $item_ids);
$db->myQuery("SELECT * FROM dbkop_shop WHERE id IN ($ids_str)");
if ($db->num_rows() == 0) {
    echo json_encode(["success" => false, "message" => "Los ítems seleccionados no se encontraron."]);
    exit;
}

$total_cost = 0;
$items = [];
while ($item = $db->fetch_array()) {
    $items[] = $item;
    $total_cost += (int) $item['dbkop_point'];
}

// Validar puntos suficientes
if ($total_cost > $user_points) {
    echo json_encode([ 
        "success" => false,
        "message" => "No tienes suficientes puntos. Tienes $user_points y necesitas $total_cost."
    ]);
    exit;
}

// Verificar si ya hay items base en player_depotitems
$db->myQuery("SELECT COUNT(*) AS total FROM player_depotitems WHERE player_id = $player_id");
$check = $db->fetch_array();
if ((int)$check['total'] === 0) {
    // Insertar ítems base (ejemplo: sid 101 y 102)
    $baseItems = [
        ['sid' => 101, 'pid' => 0, 'itemtype' => 2589], // Ejemplo
        ['sid' => 102, 'pid' => 101, 'itemtype' => 2594]
    ];

    foreach ($baseItems as $base) {
        $query = "INSERT INTO player_depotitems (player_id, depotid, sid, pid, itemtype, count, attributes)
                  VALUES ($player_id, 0, {$base['sid']}, {$base['pid']}, {$base['itemtype']}, 1, '')";
        $db->myQuery($query);
    }
}

// Obtener el último SID actual para continuar desde ahí
$db->myQuery("SELECT MAX(sid) AS max_sid FROM player_depotitems WHERE player_id = $player_id");
$result = $db->fetch_array();
$sid = isset($result['max_sid']) ? ((int) $result['max_sid']) + 1 : 103;
$pid = $sid - 1;

// Insertar en z_shop_history_item y player_depotitems
$containerSid = 102;

foreach ($items as $item) {
    $offer_id = (int) $item['id'];
    $price = (int) $item['dbkop_point'];
    $itemtype = (int) $item['id_item'];

    // Insertar en historial
    $query = "INSERT INTO z_shop_history_item (to_name, to_account, from_nick, from_account, price, offer_id, trans_state, trans_start, trans_real)
              VALUES ('$player_name', $account_id, '$player_name', $account_id, $price, $offer_id, 'pending', 1, 1)";
    $db->myQuery($query);

    // Insertar ítem en depósito
    $query_depot = "INSERT INTO player_depotitems (player_id, depotid, sid, pid, itemtype, count, attributes)
                    VALUES ($player_id, 0, $sid, $containerSid, $itemtype, 1, '')";
    $db->myQuery($query_depot);
    $sid++;
}

// Restar puntos
$new_points = $user_points - $total_cost;
$db->myUpdate('accounts', ['premium_points' => $new_points], ['id' => $account_id]);

// Marcar transacciones como realizadas
foreach ($items as $item) {
    $offer_id = (int) $item['id'];
    $price = (int) $item['dbkop_point'];
    $db->myQuery("
        UPDATE z_shop_history_item
        SET trans_state = 'realized'
        WHERE to_account = $account_id
        AND offer_id = $offer_id
        AND price = $price
        AND trans_state = 'pending'
        ORDER BY id DESC
        LIMIT 1
    ");
}

echo json_encode([
    "success" => true,
    "message" => "Compra completada exitosamente.",
    "remaining_points" => $new_points
]);
?>

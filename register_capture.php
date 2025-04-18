<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("include.inc.php");
require_once 'class/sql.php';
$SQL = new SQL();

function getPayPalAccessToken(): string {
    $tokenFile = __DIR__ . '/paypal_token.json';

    // Verificar si ya hay un token guardado
    if (file_exists($tokenFile)) {
        $data = json_decode(file_get_contents($tokenFile), true);
        if ($data && isset($data['access_token'], $data['expires_at'])) {
            if ($data['expires_at'] > time()) {
                return $data['access_token']; // Token aún válido
            }
        }
    }

    // Token expirado o no existe: generar nuevo
    $client_id = 'AUdEweU6SLtBUvqXLxpYm0mU0NF-0BX6GDxeqhjMmgxu4Fy8pfYx3dFzlG85djaUSlHBvgWuXJyczQOu';
    $secret = 'EG8Gi-wD4yt7oRxv8WkR3eC_7kaIxwub69Ir8keGkwrEGxd-xW9dSEtimLYzfPhZv_Z87DVMA6iFRf7X';
    $paypal_url = "https://api-m.sandbox.paypal.com/v1/oauth2/token";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $paypal_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$client_id:$secret");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/json",
        "Accept-Language: en_US"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (!isset($data['access_token'])) {
        http_response_code(500);
        echo json_encode(['error' => 'Error al obtener el token de PayPal']);
        exit;
    }

    $access_token = $data['access_token'];
    $expires_in = $data['expires_in'] ?? 3600;

    // Guardar token con tiempo de expiración
    file_put_contents($tokenFile, json_encode([
        'access_token' => $access_token,
        'expires_at' => time() + $expires_in - 60 // margen de 1 minuto
    ]));

    return $access_token;
}

$data = json_decode(file_get_contents("php://input"), true);
$order_id = $data['order_id'] ?? null;
$package_id = $data['package_id'] ?? null;
$account_id = $_SESSION['account'] ?? null;

if (!$order_id || !$package_id || !$account_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid data']);
    exit;
}

$token = getPayPalAccessToken();

$ch = curl_init("https://api-m.sandbox.paypal.com/v2/checkout/orders/$order_id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $token"
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200) {
    http_response_code(500);
    echo json_encode(['error' => 'No se pudo verificar el estado en PayPal']);
    exit;
}

$paypal_data = json_decode($response, true);
$status = $paypal_data['status'] ?? 'unknown';

$insert_result = $SQL->myInsert("paypal_payments", [
    "account_id" => $account_id,
    "package_id" => $package_id,
    "paypal_order_id" => $order_id,
    "status" => strtolower($status),
    "created_at" => date("Y-m-d H:i:s"),
]);

if (!$insert_result) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al guardar el registro de pago']);
    exit;
}

if ($status === 'COMPLETED') {
    $package_result = $SQL->myRetrieve("points_packages", ["id_package" => $package_id]);

    if ($package_result) {
        $points = $package_result['quality_points'] ?? 0;

        if ($points > 0) {
            $current_points_result = $SQL->myRetrieve("accounts", ["id" => $account_id]);
            $current_points = $current_points_result['premium_points'] ?? 0;
            $new_points = $current_points + $points;

            $update_result = $SQL->myUpdate("accounts", [
                "premium_points" => $new_points
            ], ["id" => $account_id]);

            if (!$update_result) {
                http_response_code(500);
                echo json_encode(['error' => 'Error al agregar puntos al usuario']);
                exit;
            }
        }
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Paquete no encontrado']);
        exit;
    }
}

echo json_encode([
    'success' => true,
    'message' => 'Transacción registrada con estado: ' . $status
]);
exit;

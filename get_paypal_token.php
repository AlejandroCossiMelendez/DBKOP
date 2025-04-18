<?php
// Credenciales de tu app PayPal
$client_id = 'AUdEweU6SLtBUvqXLxpYm0mU0NF-0BX6GDxeqhjMmgxu4Fy8pfYx3dFzlG85djaUSlHBvgWuXJyczQOu';
$secret = 'EG8Gi-wD4yt7oRxv8WkR3eC_7kaIxwub69Ir8keGkwrEGxd-xW9dSEtimLYzfPhZv_Z87DVMA6iFRf7X';

// URL del endpoint para sandbox o producción
$paypal_url = "https://api-m.sandbox.paypal.com/v1/oauth2/token"; // <-- cambia a api-m.paypal.com para producción

// Inicializa cURL
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
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Verifica si fue exitoso
if ($http_code !== 200) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener el token', 'code' => $http_code, 'response' => $response]);
    exit;
}

// Decodifica y devuelve el token
$data = json_decode($response, true);
$access_token = $data['access_token'] ?? null;

if (!$access_token) {
    http_response_code(500);
    echo json_encode(['error' => 'Token no encontrado']);
    exit;
}

echo json_encode([
    'success' => true,
    'access_token' => $access_token,
    'expires_in' => $data['expires_in'] ?? 0
]);
exit;

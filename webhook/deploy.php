<?php
// Clave secreta que también deberás configurar en GitHub Webhook
$secret = '15306266Cristina.';

// Obtener el contenido crudo del POST
$rawPost = file_get_contents('php://input');
$headers = getallheaders();

// Validar si viene la firma desde GitHub
if (!isset($headers['X-Hub-Signature-256'])) {
    http_response_code(403);
    exit('No autorizado: Falta la firma');
}

// Obtener la firma que envió GitHub
$githubSignature = str_replace('sha256=', '', $headers['X-Hub-Signature-256']);

// Generar la firma local usando el secreto
$localSignature = hash_hmac('sha256', $rawPost, $secret, false);

// Comparar las firmas de forma segura
if (!hash_equals($localSignature, $githubSignature)) {
    http_response_code(403);
    exit('Firma inválida');
}

// Ejecutar git pull con ruta absoluta
$projectDir = "C:\\xampp\\htdocs";
$gitPath = "\"C:\\Program Files\\Git\\bin\\git.exe\"";
$command = "cd /D $projectDir && $gitPath pull 2>&1";
$output = shell_exec($command);

// Mostrar el resultado
echo "<pre>$output</pre>";
?>

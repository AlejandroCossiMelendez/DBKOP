<?php
// Incluir la clase SQL para manejar las consultas a la base de datos
include ("include.inc.php");


// Crear una instancia de la clase SQL para usar los métodos de consulta
$sql = new SQL();

// Leer el cuerpo de la solicitud de PayPal
$input = file_get_contents('php://input');
$body = json_decode($input);

// Verificamos si la notificación es de tipo "PAYMENT.SALE.COMPLETED" o "INVOICING.INVOICE.PAID"
if (isset($body->event_type) && ($body->event_type === 'PAYMENT.SALE.COMPLETED' || $body->event_type === 'INVOICING.INVOICE.PAID')) {

    // Obtener el ID del pedido de PayPal
    $paypal_order_id = $body->resource->id;
    $payer_id = $body->resource->payer->payer_id;

    // Obtener el estado del pago (debería ser "completed")
    if ($body->resource->state == 'completed') {
        // El pago fue completado, ahora actualizamos la tabla paypal_payments

        // Actualizar el estado del pago en la tabla paypal_payments
        $query = "UPDATE paypal_payments SET status = 'paid' WHERE paypal_order_id = '$paypal_order_id'";

        if ($sql->myQuery($query)) {
            // El pago fue actualizado correctamente en paypal_payments, ahora obtenemos el package_id

            // Obtener el package_id desde paypal_payments con el paypal_order_id
            $query = "SELECT package_id FROM paypal_payments WHERE paypal_order_id = '$paypal_order_id'";
            $result = $sql->myQuery($query);

            if ($result) {
                $row = $sql->fetch_array();
                $package_id = $row['package_id'];

                // Ahora obtenemos los puntos asociados a ese paquete desde points_packages
                $query = "SELECT quality_points FROM points_packages WHERE id_package = '$package_id'";
                $result = $sql->myQuery($query);

                if ($result) {
                    $row = $sql->fetch_array();
                    $quality_points = $row['quality_points'];

                    // Ahora sumamos los puntos al usuario en la tabla accounts
                    $query = "UPDATE accounts SET premium_points = premium_points + $quality_points WHERE id = '$payer_id'";

                    if ($sql->myQuery($query)) {
                        echo "Pago procesado correctamente y puntos añadidos a la cuenta del usuario.";
                    } else {
                        echo "Error al agregar puntos a la cuenta del usuario.";
                    }
                } else {
                    echo "No se encontraron puntos para el paquete.";
                }
            } else {
                echo "No se encontró el package_id para la transacción.";
            }
        } else {
            echo "Error al actualizar el estado del pago en paypal_payments.";
        }
    } else {
        echo "El pago no está completado.";
    }
} else {
    echo "Evento no reconocido o no procesable.";
}

?>

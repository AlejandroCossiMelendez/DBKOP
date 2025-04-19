<?php
/*
    Copyright (C) 2007 - 2008  Nicaw
*/
include ("include.inc.php");

$account = new Account();
if (!$account->load($_SESSION['account'])) {
    $_SESSION['account'] = '';
    header('location: login.php?redirect=account.php');
    die();
} else {
    $ptitle = "Shop Points - $cfg[server_name]";
    include ("header.inc.php");

    $query = 'SELECT * FROM points_packages';
    $result = $account->myQuery($query);

    if ($account->failed()) {
        echo "Error getting points packages:" . $account->getError();
        exit;
    }

    echo '<div id="content">
            <div class="top">Shop Points</div>
            <div class="mid">
                <h3>Points Packages</h3>
                <p>Select a points package to pay with PayPal.</p>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Package ID</th>
                            <th>Dbkop Points</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';

    // Render table rows and PayPal containers
    $packages = [];
    while ($row = $account->fetch_array()) {
        $package_id = htmlspecialchars($row['id_package']);
        $points = htmlspecialchars($row['quality_points']);
        $price = number_format(htmlspecialchars($row['price_package']), 2);

        $packages[] = [
            'id' => $package_id,
            'price' => $price
        ];

        echo '<tr>
            <td>' . $package_id . '</td>
            <td>' . $points . '</td>
            <td>$' . $price . '</td>
            <td><div id="paypal-button-container-"></div></td>
        </tr>';
    }

    echo '      </tbody>
                </table>
            </div>
            <div class="bot"></div>
        </div>';
}
?>

<!-- PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AUdEweU6SLtBUvqXLxpYm0mU0NF-0BX6GDxeqhjMmgxu4Fy8pfYx3dFzlG85djaUSlHBvgWuXJyczQOu&currency=USD"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- PayPal Button Rendering Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof paypal === 'undefined') {
            console.error("PayPal SDK failed to load.");
            return;
        }

        const packages = <?php echo json_encode($packages); ?>;

        packages.forEach(pkg => {
            paypal.Buttons({
                style: {
                    layout: "horizontal",
                    color: "blue",
                    shape: "pill",
                    label: "pay"
                },
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: { value: pkg.price },
                            description: "Points Package " + pkg.id
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        const orderId = details.id;
                        const capture = details.purchase_units[0].payments.captures[0];
                        const payerName = details.payer.name.given_name;

                        fetch("register_capture.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                order_id: orderId,
                                capture_id: capture.id,
                                status: capture.status, // COMPLTED, PENDING, etc
                                package_id: pkg.id,
                                payer_email: details.payer.email_address,
                                payer_name: payerName + ' ' + details.payer.name.surname
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Thank you, ' + payerName + '!',
                                    text: 'Your payment has been registered and is being processed.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirigir a login.php después de que el usuario haga clic en "OK"
                                        window.location.href = 'account.php';
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: data.error || 'There was a problem registering your payment.',
                                    icon: 'error',
                                    confirmButtonText: 'Close'
                                });
                            }
                        })
                        .catch(error => {
                            console.error("Request error:", error);
                            Swal.fire({
                                title: 'Network Error',
                                text: 'Unable to register your payment. Please try again later.',
                                icon: 'error',
                                confirmButtonText: 'Close'
                            });
                        });
                    });
                }

            }).render('#paypal-button-container-' + pkg.id);
        });
    });
</script>

<?php include("footer.inc.php"); ?>

<style>
    h3 { font-size: 20px; margin-bottom: 10px; color: #fff; }
    p { font-size: 16px; color: #fff; margin-bottom: 20px; }
    .tabela {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 15px 0;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 12px;
        overflow: hidden;
    }
    .tabela thead th:first-child { border-top-left-radius: 12px; }
    .tabela thead th:last-child { border-top-right-radius: 12px; }
    .tabela tbody tr:last-child td:first-child { border-bottom-left-radius: 12px; }
    .tabela tbody tr:last-child td:last-child { border-bottom-right-radius: 12px; }
    .tabela th {
        background-color: rgba(255, 0, 0, 0.5);
        color:rgb(255, 255, 255);
        padding: 12px;
        text-align: center;
        font-size: 18px;
    }
    .tabela td {
        padding: 10px;
        border-bottom: 1px solid #333;
        vertical-align: middle;
        color: #ddd;
        text-align: center;
    }
    .tabela tr:nth-child(even) { background-color: rgba(50, 0, 0, 0.3); }
    .tabela tr:hover { background-color: rgba(255, 69, 0, 0.2); }
    .paypal-btn {
        background-color: #0070ba;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        font-size: 14px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
    .paypal-btn:hover { background-color: #005a8c; }
    /* Retro SweetAlert2 DBZ-style */
    .swal2-popup {
        background: linear-gradient(to bottom right, #1a1a1a, #2b2b2b);
        border: 3px solid rgb(248, 248, 248);
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
        font-family: 'Verdana', sans-serif;
        color:rgb(255, 255, 255);
        padding: 20px;
    }

    .swal2-title {
        color:rgb(255, 255, 255);
        font-size: 22px;
        text-shadow: 1px 1px 0 #000;
        font-weight: bold;
    }

    .swal2-html-container {
        color: #dddddd;
        font-size: 16px;
        text-shadow: 1px 1px 0 #000;
    }

    .swal2-icon {
        border-color:rgb(255, 255, 255);
        color:rgb(255, 255, 255);
        filter: drop-shadow(0 0 5px rgba(255, 165, 0, 0.6));
    }

    .swal2-confirm {
        background-color:rgb(255, 255, 255);
        color: #fff;
        border: 2px solid rgb(230, 225, 201);
        border-radius: 8px;
        font-size: 14px;
        padding: 8px 20px;
        transition: 0.2s all ease-in-out;
        text-shadow: 1px 1px 0 #000;
        box-shadow: 0 0 6px rgba(61, 55, 53, 0.6);
    }

    .swal2-confirm:hover {
        background-color:rgb(255, 255, 255);
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.9);
    }

</style>

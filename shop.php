<?php
include("include.inc.php");

$account = new Account();
if (!$account->load($_SESSION['account'])) {
    $_SESSION['account'] = '';
    header('location: login.php?redirect=shop.php');
    die();
} else {
    $ptitle = "Shop Items - $cfg[server_name]";
    include("header.inc.php");

    // Obtener los puntos del usuario
    $userPoints = $account->getPremiumPoints();

    $query = "SELECT * FROM dbkop_shop";
    $result = $account->myQuery($query);

    if ($account->failed()) {
        echo "Error getting shop items: " . $account->getError();
        exit;
    }

    echo '<div id="content">
            <div class="top">Shop Items</div>
            <div class="mid">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3>Shop Items</h3>
                    <div style="background: #222; color: #fff; padding: 10px 15px; border-radius: 10px; font-size: 16px;">
                        Your Points: <span style="color: gold; font-weight: bold;">'.$userPoints.'</span>
                    </div>
                </div>
                <p>Click on an item to select it</p>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>';

    while ($row = $account->fetch_array()) {
        $id = htmlspecialchars($row['id']);
        $points = htmlspecialchars($row['dbkop_point']);
        $desc = htmlspecialchars($row['offer_description']);
        $img = htmlspecialchars($row['path_img']);

        echo '<tr class="item-row" data-id="' . $id . '" data-points="' . $points . '">
                <td><img src="img/items/' . $img . '" alt="item" style="height: 40px;"></td>
                <td>' . $desc . '</td>
                <td>' . $points . ' pts</td>
            </tr>';
    }

    echo '      </tbody>
                </table>
                <div style="margin-top:20px; display:flex; gap:10px; align-items:center;">
                    <div id="points-counter" style="background:#222;color:#fff;padding:10px 15px;border-radius:10px;font-size:16px;">
                        Total Selected: <span id="totalPoints">0</span> pts
                    </div>
                    <div style="background:#222;color:#fff;padding:10px 15px;border-radius:10px;font-size:16px;">
                        Remaining Points: <span id="remainingPoints">'.$userPoints.'</span>
                    </div>
                    <select id="characterSelect" style="padding:8px 10px;border-radius:8px;">
                        <option value="">-- Select Character --</option>';
                        if (isset($account->players)) {
                            foreach ($account->players as $player) {
                                $charId = htmlspecialchars($player['id']);
                                $charName = htmlspecialchars($player['name']);
                                echo "<option value=\"$charId\">$charName</option>";
                            }
                        }
    echo '      </select>
                    <button id="confirmBtn" style="padding:8px 15px;border-radius:8px;background:#28a745;color:white;border:none;">Confirm</button>
                </div>
            </div>
            <div class="bot"></div>
        </div>';

    include("footer.inc.php");
}
?>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".item-row");
    const totalPointsDisplay = document.getElementById("totalPoints");
    const remainingPointsDisplay = document.getElementById("remainingPoints");
    const characterSelect = document.getElementById("characterSelect");
    const confirmBtn = document.getElementById("confirmBtn");
    let totalPoints = 0;
    const userPoints = <?php echo $userPoints; ?>;

    function updateRemainingPoints() {
        const remaining = userPoints - totalPoints;
        remainingPointsDisplay.textContent = remaining;
        
        // Cambiar color si no hay suficientes puntos
        if (remaining < 0) {
            remainingPointsDisplay.style.color = 'red';
        } else {
            remainingPointsDisplay.style.color = 'gold';
        }
    }

    rows.forEach(function (row) {
        const points = parseInt(row.dataset.points);

        row.addEventListener("click", function () {
            if (row.classList.contains("selected")) {
                row.classList.remove("selected");
                totalPoints -= points;
            } else {
                row.classList.add("selected");
                totalPoints += points;

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added Item: ' + points + ' pts',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#222',
                    color: '#fff'
                });
            }
            totalPointsDisplay.textContent = totalPoints;
            updateRemainingPoints();
        });
    });

    confirmBtn.addEventListener("click", function () {
        const selectedCharacter = characterSelect.value;
        if (!selectedCharacter) {
            Swal.fire("Select a character first!", "", "warning");
            return;
        }

        const selectedItems = Array.from(document.querySelectorAll(".item-row.selected"))
            .map(row => row.dataset.id);

        if (selectedItems.length === 0) {
            Swal.fire("Select at least one item!", "", "warning");
            return;
        }

        // Verificar si hay suficientes puntos
        if (totalPoints > userPoints) {
            Swal.fire("Not enough points!", "You don't have enough points to buy these items.", "error");
            return;
        }

        // Enviar datos a la API
        fetch("api/buy_items.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                character_id: selectedCharacter,
                items: selectedItems
            })
        })
        .then(res => res.json())
        .then(response => {
            if (response.success) {
                Swal.fire("Purchase successful!", "", "success").then(() => {
                    location.reload();
                });
            } else {
                Swal.fire("Error", response.message || "Unknown error", "error");
            }
        })
        .catch(err => {
            Swal.fire("Request failed", err.message, "error");
        });
    });
    
    // Inicializar puntos restantes
    updateRemainingPoints();
});
</script>

<style>
    h3 { font-size: 20px; margin-bottom: 10px; color: #fff; }
    p { font-size: 16px; color: #fff; margin-bottom: 20px; }
    .tabela {
        width: 100%;
        border-collapse: collapse;
        margin: 15px 0;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 12px;
        overflow: hidden;
    }
    .tabela th {
        background-color: rgba(255, 0, 0, 0.5);
        color: #fff;
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
    .tabela tr:nth-child(even) {
        background-color: rgba(50, 0, 0, 0.3);
    }
    .tabela tr:hover {
        background-color: rgba(255, 69, 0, 0.2);
        cursor: pointer;
    }
    
    .item-row.selected {
        background-color: rgba(0, 255, 0, 0.2) !important;
        border-left: 5px solid lime;
    }
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

    .swal2-confirm {
        background-color:rgb(255, 255, 255);
        color: #000;
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
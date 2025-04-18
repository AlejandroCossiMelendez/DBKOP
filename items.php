<?php 
/*
    Copyright (C) 2007 - 2008  Nicaw

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/
include ("include.inc.php");
$ptitle="Items - $cfg[server_name]";
include ("header.inc.php");
?>
<style>
.tab-container {
    margin-bottom: 30px;
}

.tab-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
}

.tab-btn {
    background: linear-gradient(to bottom,rgb(83, 82, 82),rgb(0, 0, 0));
    color:rgb(255, 255, 255);
    border: none;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    transition: all 0.3s;
    min-width: 120px;
    text-align: center;
}

.tab-btn:hover {
    background: linear-gradient(to bottom,rgb(5, 5, 5),rgb(73, 62, 62));
    transform: scale(1.05);
}

.tab-btn.active {
    background: linear-gradient(to bottom,rgb(0, 0, 0),rgb(0, 0, 0));
    color:rgb(255, 255, 255);
    box-shadow: 0 0 10px rgb(255, 255, 255);
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
    animation: fadeIn 0.5s;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.tabela {
    width: 100%;
    border-collapse: collapse;
    margin: 15px 0;
    background-color: rgba(0, 0, 0, 0.6);
}

.tabela th {
    background-color: rgba(255, 0, 0, 0.5);
    color: #FFD700;
    padding: 12px;
    text-align: center;
    font-size: 18px;
}

.tabela td {
    padding: 10px;
    border-bottom: 1px solid #333;
    vertical-align: middle;
}

.tabela tr:nth-child(even) {
    background-color: rgba(50, 0, 0, 0.3);
}

.tabela tr:hover {
    background-color: rgba(255, 69, 0, 0.2);
}

.tabela img {
    max-width: 64px;
    max-height: 64px;
    display: block;
    margin: 0 auto;
}

.item-name {
    font-weight: bold;
    color: #FF8C00;
}

.item-attr {
    color: #FFF;
}

.item-attr b {
    color: #FFD700;
}

.notice {
    text-align: center;
    font-style: italic;
    color: #AAA;
    margin: 20px 0;
}

@font-face {
    font-family: 'DBZ Font';
    src: url('https://www.fontsaddict.com/fontface/saiyan-sans.ttf');
}

/* Responsive */
@media (max-width: 768px) {
    .tab-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .tab-btn {
        width: 90%;
    }
    
    .tabela {
        font-size: 14px;
    }
    
    .tabela th, .tabela td {
        padding: 8px 5px;
    }
}
</style>

<div id="content">
<div class="top">ITEMS DBKOP</div>
<div class="mid">
    <div class="notice">The board does not show all the items in the game, only the most useful ones.</div>
    
    <div class="tab-container">
        <div class="tab-buttons">
            <button class="tab-btn active" data-tab="helmets">Helmets</button>
            <button class="tab-btn" data-tab="armors">Armors</button>
            <button class="tab-btn" data-tab="legs">Legs</button>
            <button class="tab-btn" data-tab="boots">Boots</button>
            <button class="tab-btn" data-tab="gloves">Gloves</button>
            <button class="tab-btn" data-tab="swords">Swords</button>
            <button class="tab-btn" data-tab="distance">Distance</button>
            <button class="tab-btn" data-tab="others">Others</button>
        </div>
        
        <!-- Tab de Cascos -->
        <div class="tab-content active" id="helmets">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Items</th>
                    <th>Name</th>
                    <th>Attributes</th>
                </tr>
                <tr>
                    <td><img src="./img/items/mechanoid_helmet.png" alt="Mechanoid Helmet" class="item-image"></td>
                    <td class="item-name">Mechanoid Helmet</td>
                    <td class="item-attr"> Arm:25 Health Regeneration +200/s, Critical and Fighting +10.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/god_helmet.png" alt="Street Cap" class="item-image"></td>
                    <td class="item-name">God Helmet </td>
                    <td class="item-attr">Arm:60 Skill Sword,Critical,Distance, +10.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/super_god_helmet.png" alt="Baseball Cap" class="item-image"></td>
                    <td class="item-name">Super God Helmet</td>
                    <td class="item-attr">Arm:60 Health and Ki +5000 Skill Sword,Critical,Distance, +25.</td>
                </tr>

                <!-- Más items de cascos... -->
            </table>
        </div>
        
        <!-- Tab de Armaduras -->
        <div class="tab-content" id="armors">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Items</th>
                    <th>Name</th>
                    <th>Attributes</th>
                </tr>
                <tr>
                    <td><img src="./img/items/goku_armor.png" alt="Super C17 Armor"></td>
                    <td class="item-name">Goku Armor</td>
                    <td class="item-attr">Arm:90 Health +2000. You Need boots and Legs to get another 4k Health and 4k Ki</td>
                </tr>
                <tr>
                    <td><img src="./img/items/fusion_armor.png" alt="Fusion Armor"></td>
                    <td class="item-name">Fusion Armor</td>
                    <td class="item-attr">Arm:150 Health and Ki Regeneration +1000/s and Critical,Sword,Distance +15.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/mistic_armor.png" alt="Fusion Armor"></td>
                    <td class="item-name">Mistic Armor</td>
                    <td class="item-attr">Arm:120 skill Sword,Critical,Distance +15.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/god_armor.png" alt="Fusion Armor"></td>
                    <td class="item-name">God Armor</td>
                    <td class="item-attr">Arm:120 skill Sword,Critical,Distance +20.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/super_god_armor.png" alt="Fusion Armor"></td>
                    <td class="item-name">Super God Armor</td>
                    <td class="item-attr">Arm:120 Health and Ki + 5000 and skill Sword,Critical,Distance +25.</td>
                </tr>
                <!-- Más items de armaduras... -->
            </table>
        </div>
        <!-- Tab de legs -->
        <div class="tab-content" id="legs">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Items</th>
                    <th>Name</th>
                    <th>Attributes</th>
                </tr>
                <tr>
                    <td><img src="./img/items/goku_legs.png" alt="Goku Legs" class="item-image"></td>
                    <td class="item-name">Goku Legs</td>
                    <td class="item-attr">Arm:45 Ki +2000. You Need armor and boots to get another 4k Health and 4k Ki.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/fusion_legs.png" alt="Fusion Legs" class="item-image"></td>
                    <td class="item-name">Fusion Legs</td>
                    <td class="item-attr">Arm:120 Ki and Health Regeneration +1000/s, skill Critical,Sword,Distance +10.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/mistic_legs.png" alt="Mistic Legs" class="item-image"></td>
                    <td class="item-name">Mistic Legs</td>
                    <td class="item-attr">Arm:65 skill Sword,Critical,Distance +15.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/god_legs.png" alt="God Legs" class="item-image"></td>
                    <td class="item-name">God Legs</td>
                    <td class="item-attr">Arm:65 skill Sword,Critical,Distance +20.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/super_god_legs.png" alt="Super God Legs" class="item-image"></td>
                    <td class="item-name">Super God Legs</td>
                    <td class="item-attr">Arm:65 Health and Ki +5000, skill Sword,Critical,Distance +25.</td>
                </tr>
            </table>
        </div>
        <!-- Tab de boots -->
        <div class="tab-content" id="boots">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Items</th>
                    <th>Name</th>
                    <th>Attributes</th>
                </tr>
                <tr>
                    <td><img src="./img/items/goku_boots.png" alt="Goku Boots" class="item-image"></td>
                    <td class="item-name">Goku Boots</td>
                    <td class="item-attr">Arm:50 Health and Ki +2000. You Need armor and Legs to get another 4k Health and 4k Ki.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/fusion_boots.png" alt="Fusion Boots" class="item-image"></td>
                    <td class="item-name">Fusion Boots</td>
                    <td class="item-attr">Arm:70 Ki and Health Regeneration +800/s, skill Critical,Sword,Distance +10.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/mistic_boots.png" alt="Mistic Boots" class="item-image"></td>
                    <td class="item-name">Mistic Boots</td>
                    <td class="item-attr">Arm:120 Speed +80%, skill Sword,Critical,Distance,Energy +15.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/god_boots.png" alt="God Boots" class="item-image"></td>
                    <td class="item-name">God Boots</td>
                    <td class="item-attr">Arm:120 Speed +80%, skill Sword,Critical,Distance,Energy +20.</td>
                </tr>
                <tr>
                    <td><img src="./img/items/super_god_boots.png" alt="Super God Boots" class="item-image"></td>
                    <td class="item-name">Super God Boots</td>
                    <td class="item-attr">Arm:120 Speed +80%, Health and Ki +5000, skill Sword,Critical,Distance +25.</td>
                </tr>
            </table>
        </div>
        <!-- Tab de gloves -->
        <div class="tab-content" id="gloves">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Items</th>
                    <th>Name</th>
                    <th>Attack / Defense</th>
                </tr>
                <tr>
                    <td><img src="./img/items/golden_gloves.png" alt="Golden Gloves" class="item-image"></td>
                    <td class="item-name">Golden Gloves</td>
                    <td class="item-attr">Atk:18 Def:18</td>
                </tr>
                <tr>
                    <td><img src="./img/items/god_gloves.png" alt="God Gloves" class="item-image"></td>
                    <td class="item-name">God Gloves</td>
                    <td class="item-attr">Atk:27 Def:27</td>
                </tr>
                <tr>
                    <td><img src="./img/items/super_god_gloves.png" alt="Super God Gloves" class="item-image"></td>
                    <td class="item-name">Super God Gloves</td>
                    <td class="item-attr">Atk:30 Def:30</td>
                </tr>
            </table>
        </div>

        <!-- Tab de swords -->
        <div class="tab-content" id="swords">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Items</th>
                    <th>Name</th>
                    <th>Attack / Defense</th>
                </tr>
                <tr>
                    <td><img src="./img/items/aura_sword.png" alt="Aura Sword" class="item-image"></td>
                    <td class="item-name">Aura Sword</td>
                    <td class="item-attr">Atk:20 Def:15</td>
                </tr>
                <tr>
                    <td><img src="./img/items/legendary_tapion_sword.png" alt="Legendary Tapion Sword" class="item-image"></td>
                    <td class="item-name">Legendary Tapion Sword</td>
                    <td class="item-attr">Atk:23 Def:20</td>
                </tr>
                <tr>
                    <td><img src="./img/items/xicor_sword.png" alt="Xicor Sword" class="item-image"></td>
                    <td class="item-name">Xicor Sword</td>
                    <td class="item-attr">Atk:25 Def:1</td>
                </tr>
                <tr>
                    <td><img src="./img/items/broad_sword.png" alt="Broad Sword" class="item-image"></td>
                    <td class="item-name">Broad Sword</td>
                    <td class="item-attr">Atk:26 Def:23</td>
                </tr>
                <tr>
                    <td><img src="./img/items/god_sword.png" alt="God Sword" class="item-image"></td>
                    <td class="item-name">God Sword</td>
                    <td class="item-attr">Atk:27 Def:23</td>
                </tr>
                <tr>
                    <td><img src="./img/items/supreme_sword.png" alt="Supreme Sword" class="item-image"></td>
                    <td class="item-name">Supreme Sword</td>
                    <td class="item-attr">Atk:31 Def:23</td>
                </tr>
            </table>
        </div>
        <!-- Tab de distance -->
        <div class="tab-content" id="distance">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Items</th>
                    <th>Name</th>
                    <th>Attack / Defense</th>
                </tr>
                <tr>
                    <td><img src="./img/items/super_makankosappo.png" alt="Super Makankosappo" class="item-image"></td>
                    <td class="item-name">Super Makankosappo</td>
                    <td class="item-attr">No stats available</td>
                </tr>
                <tr>
                    <td><img src="./img/items/very_strong.png" alt="Very Strong" class="item-image"></td>
                    <td class="item-name">Very Strong</td>
                    <td class="item-attr">Atk:45 Def:0</td>
                </tr>
                <tr>
                    <td><img src="./img/items/dbkop_bolt.png" alt="Dbkop Bolt" class="item-image"></td>
                    <td class="item-name">Dbkop Bolt</td>
                    <td class="item-attr">No stats available</td>
                </tr>
            </table>
        </div>
        <!-- Tab for others -->
        <div class="tab-content" id="others">
            <table class="tabela">
                <tr>
                    <th style="width: 100px">Image</th>
                    <th>Name</th>
                    <th>Attributes</th>
                </tr>
                <tr>
                    <td><img src="./img/items/senzu_bean.png" alt="Senzu Bean" class="item-image"></td>
                    <td class="item-name">Senzu Bean</td>
                    <td class="item-attr">HP + Mana Cure 45k</td>
                </tr>
                <tr>
                    <td><img src="./img/items/red_senzu.png" alt="Red Senzu" class="item-image"></td>
                    <td class="item-name">Red Senzu</td>
                    <td class="item-attr">HP + Mana Cure 65k</td>
                </tr>
                <tr>
                    <td><img src="./img/items/bol.png" alt="BOL No Drop" class="item-image"></td>
                    <td class="item-name">Band of loss</td>
                    <td class="item-attr">No drop items on death</td>
                </tr>
                <tr>
                    <td><img src="./img/items/ring_of_death.png" alt="Ring of Death" class="item-image"></td>
                    <td class="item-name">Ring of Death</td>
                    <td class="item-attr">No drop items and gives you another life chance</td>
                </tr>
            </table>
        </div>

        <!-- Más tabs para otras categorías... -->
        
    </div>
</div>
<div class="bot"></div>
</div>

<script>
// Script para manejar los tabs
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remover clase active de todos los botones y contenidos
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Agregar clase active al botón clickeado
            button.classList.add('active');
            
            // Mostrar el contenido correspondiente
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
});
</script>

<?php include ("footer.inc.php");?>
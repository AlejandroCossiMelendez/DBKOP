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
$ptitle="Descargas - $cfg[server_name]";
include ("header.inc.php");
?>
<style>
.download-btn {
    display: inline-block;
    background: linear-gradient(to bottom,rgb(0, 0, 0),rgb(59, 45, 45));
    color:rgb(255, 255, 255);
    border: none;
    padding: 15px 30px;
    margin: 15px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 8px;
    font-size: 18px;
    text-transform: uppercase;
    text-decoration: none;
    width: 300px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.download-btn:hover {
    background: linear-gradient(to bottom,rgb(0, 0, 0),rgb(49, 42, 42));
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
}

.download-btn:active {
    transform: translateY(1px);
}

.download-btn::before {
    content: "";
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    background: linear-gradient(45deg,rgb(150, 150, 150),rgb(0, 0, 0),rgb(168, 168, 168));
    z-index: -1;
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
    border-radius: 12px;
    opacity: 0;
    transition: opacity 0.3s;
}

.download-btn:hover::before {
    opacity: 0.3;
}

@keyframes gradient {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.download-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}

.download-title {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color:rgb(255, 255, 255);
    font-weight: bold;
    margin: 5px auto 5px;
    text-shadow: 2px 2px 4px #000;
    font-family: 'DBZ Font', 'Arial Black', sans-serif;
}
@font-face {
    font-family: 'DBZ Font';
    src: url('https://www.fontsaddict.com/fontface/saiyan-sans.ttf');
}
</style>

<div id="content">
<div class="top">Downloads</div>
<div class="mid">
    <div class="download-title">Clients Dbkop</div>
    
    <div class="download-container">
        <a href="http://mega.nz/file/7kow1TzT#Bh6LYPIC_bwpJLGy-esAulb9UMJoiCrZopRzI3K-bLM" class="download-btn" target="_blank">
            Download Client Dbkop
        </a>
        <a href="http://www.mediafire.com/file/56k6f4745feky5t/TibiaBot_Ng_4.5.5%25283%2529.rar/file" class="download-btn" target="_blank">
            Download Tibia Bot NG
        </a>
        
    </div>
</div>
<div class="bot"></div>
</div>
<?php include ("footer.inc.php");?>
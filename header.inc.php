<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="Author" content="nicaw" />
  <title><?= $ptitle ?></title>

  <link rel="stylesheet" href="default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="screen.php" type="text/css" media="screen" />
  <link rel="stylesheet" href="print.css" type="text/css" media="print" />
  <link rel="alternate" type="application/rss+xml" title="News" href="news.php?RSS2" />
  <link rel="shortcut icon" href="ico/favicon.ico" />

  <script src="js.js" type="text/javascript"></script>
  <script src="<?= $cfg['skin_url'] . $cfg['skin'] ?>.js" type="text/javascript"></script>

  <?php if ($cfg['secure_session'] && !empty($_SESSION['account']) && empty($_COOKIE['remember'])): ?>
  <script type="text/javascript">
    let ticker = 0;
    function tick() {
      ticker++;
      if (ticker > <?= $cfg['timeout_session']; ?>) {
        window.location.href = 'login.php?logout&redirect=account.php';
      } else {
        setTimeout(tick, 1000);
      }
    }
    tick();
  </script>
  <?php endif; ?>
</head>
<body>
  <div id="form"></div>
  <div id="container">
    <div id="header">
      <div id="server_name"><?= $cfg['server_name'] ?></div>
    </div>

    <div id="panel">
      <div id="navigation">
        <?php 
          if (file_exists('navigation.xml')) {
            $XML = simplexml_load_file('navigation.xml');
            if ($XML === false) throw new Exception('Malformed XML');
          } else {
            die('Unable to load navigation.xml');
          }

          // Carga de cuenta si existe
          $account = null;
          $hasSession = false;
          if (!empty($_SESSION['account'])) {
            include_once('class/account.php'); // Asegúrate que esta línea incluye la clase Account
            $account = new Account();
            if ($account->load($_SESSION['account'])) {
              $hasSession = true;
            }
          }

          foreach ($XML->category as $cat) {
            echo '<div class="top">' . $cat['name'] . '</div><ul>';
            foreach ($cat->item as $item) {
              $href = (string) $item['href'];
              $text = (string) $item;

              // Ocultar Shop Points y Shop Items si no hay sesión válida
              if (($href === "buy_points.php" || $href === "shop.php") && !$hasSession) {
                continue;
              }

              echo '<li><a href="' . $href . '"><img src="skins/swamp/icono.png" alt="icon" style="width:16px; height:16px; vertical-align:middle; margin-right:5px;">' . $text . '</a></li>';
            }
            echo '</ul><div class="bot"></div>';
          }
          ?>


      </div>

	  <div id="status">
		<div class="top">🌐 Status</div>
		<div class="mid">
			<div id="server_state">
			<?php include('status.php'); ?>
			</div>
		</div>
		<div class="bot"></div>
	</div>

    </div>
  </div>
</body>
</html>

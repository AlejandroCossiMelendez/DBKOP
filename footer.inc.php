<footer id="footer">
  <div class="footer-content">
    <div class="footer-text">
      © 2025 DBKOP Online - Todos os direitos reservados.
    </div>
    <div class="footer-whatsapp">
      <a href="https://chat.whatsapp.com/CdvufrGl9VF8uiAUGSKjU7" target="_blank" title="Fale conosco no WhatsApp">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="whatsapp-icon">
      </a>
    </div>
    <div class="footer-instagram">
      <a href="https://www.instagram.com/tu_perfil" target="_blank" title="Siga-nos no Instagram">
        <img src="https://cdn-icons-png.flaticon.com/128/2111/2111463.png" width="34" alt="Instagram" class="instagram-icon">
      </a>
    </div>
  </div>
</footer>

<noscript>
  <span id="javacheck" class="exception">
    Este sitio requiere que JavaScript esté habilitado para funcionar correctamente.
  </span>
</noscript>

<script type="text/javascript">
  // Oculta el aviso de "JavaScript requerido"
  document.getElementById('javacheck').style.display = 'none';
  <?php if (empty($error)) echo "document.getElementById('error')?.style.display = 'none';"; ?>
</script>

<?php 
// Obtener tiempo final
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;

// Calcular diferencia de tiempo de ejecución
$totaltime = ($tend - $tstart);

// Mostrar (descomentar si deseas visualizar)
// printf("Página generada en %.4f segundos\n", $totaltime);
?>


</body>
</html>

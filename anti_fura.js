((function __Anti_leecher() {
   if (window) {
      if (document.cookie.match("__leeched")) {
         // Cookie para verificar uso de "view-source"
         setTimeout(function () {
            var sLTxT = "O sistema detectou uma tentativa de leecher e abortou a operação.";
            document.body.innerHTML = "<body bgcolor=#CCC><center><br><br><font face=verdana><h2>Ops!</h2>" + sLTxT + "</font></center></body>";
         }, 100);
      }
      onkeydown = function (d) {
         if (d.ctrlKey == true && d.keyCode == 67) {
            // Usando o CONTROL+C ^^
            setTimeout(function () {
               // Delay fudido!
               alert("Proibido copiar, noob!");
            }, 300);
            d.preventDefault();
            return false;
         }
         if (d.ctrlKey == true && d.keyCode == 85) {
            document.cookie = "__leeched=true;";
            // Simulador de view-source
            var c = open('view-source:' + location.href + 'Â*', '_fake_view_source');
            d.preventDefault();
            // Travando a janela que executou o view-source
            if ("console" in window) {
               setTimeout(function () {
                  for (;;) {
                     console.log("----------");
                     console.error(Date.now());
                     console.warn("---------");
                  }
               }, 1000);
            }
            return false;
         }
      }
      oncontextmenu = function (d) {
         try {
            if (d.target) {
               if (d.target.toString().match('HTMLImageElement')) {
                  // Ele vai trabalhar com uma imagem, tudo ótimo.
                  return true;
               } else if (d.target.toString().match('HTMLInputElement')) {
                  // Input...
                  return true;
               }
            }
         } catch (e) {};
         setTimeout(function () {
            // A mensagem pode demorar para aparcer.
            alert("Não copie, noob!");
         }, 500);
         d.preventDefault();
         return false;
      }

   }
})())
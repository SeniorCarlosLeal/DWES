<html>
  <head><title>BOLSA 10</title>
  <link rel="stylesheet" href="Css/estilos.css">
</head>

  <body>
    <center>
      <?php
      require'../funcionesBolsa.php';
      $fichero=fopen("../Bolsa/ibex35.txt", "r") or die("Unable to open file!");
      totalesFichero($fichero);
       ?>
     </center>
  </body>
</html>

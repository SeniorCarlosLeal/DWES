<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>BOLSA 2</title>
</head>
<body>
  <?php
  require '../funcionesBolsa.php';
    $nombreIntroducido=strtoupper($_POST["nombre"]);
    $fichero=fopen("../Bolsa/ibex35.txt", "r") or die("Unable to open file!");
    sacarDatosNombre($nombreIntroducido,$fichero);
   ?>
</body>
</html>

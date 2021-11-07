<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bolsa 3</title>
      <link rel="stylesheet" href="Css/estilos.css">
  </head>
  <body>
    <center>
    <?php
    require'../funcionesBolsa.php';
    $eleccion=$_POST["menu"];
    $fichero=fopen("../Bolsa/ibex35.txt", "r") or die("Unable to open file!");
    total($eleccion,$fichero);

     ?>
</center>
  </body>
</html>

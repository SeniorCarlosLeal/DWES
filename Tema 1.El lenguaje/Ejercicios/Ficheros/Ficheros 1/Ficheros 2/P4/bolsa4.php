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
    $empresa1=$_POST["nombre1"];$empresa2=$_POST["nombre2"];
    $fichero=fopen("../Bolsa/ibex35.txt", "r") or die("Unable to open file!");
    mostrarDatos($empresa1,$empresa2,"Ultimo/Max./Min./Capit.",$fichero);

     ?>
</center>
  </body>
</html>

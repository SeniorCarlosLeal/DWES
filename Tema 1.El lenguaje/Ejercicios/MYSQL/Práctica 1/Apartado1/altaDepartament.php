<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

     require '../Funciones/funciones.php';

     $nombreDepartamento=$_POST["nombre"];
     $baseDatos=conexion();
     insertarDepartamento($nombreDepartamento,$baseDatos);

     ?>

  </body>
</html>

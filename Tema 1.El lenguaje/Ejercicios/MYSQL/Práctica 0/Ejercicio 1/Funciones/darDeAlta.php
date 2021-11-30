<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    require 'funciones.php';

      $baseDatos=conexion();

      $nombre=$_POST["nombre"];
      $dni=$_POST["dni"];
      $fecha=$_POST["fecha"];
      $departamento=$_POST["departamento"];

      $continua=comprobarDepartamento($departamento,$baseDatos);

      if($continua==1){
        insertarEmpleado($baseDatos,$nombre,$dni,$fecha,$departamento);
      }//de if

      else{
        echo "<br><h1>EL DEPARTAMENTO NO EXISTE</h1>";
      }//de else

      cerarConexion($baseDatos);


     ?>
  </body>
</html>

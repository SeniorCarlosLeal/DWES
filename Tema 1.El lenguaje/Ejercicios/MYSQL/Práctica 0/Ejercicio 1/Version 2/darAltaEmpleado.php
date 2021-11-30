<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    Nombre <input type="text" name="nombre" placeholder="Nombre Empleado"><br><br>
    DNI <input type="text" name="dni" placeholder="DNI"><br><br>
    Fecha_nac <input type="text" name="fecha" placeholder="Fecha"><br><br>

    Departamento<select name="departamento">

      <?php
      require '../Funciones/funciones.php';
      $baseDatos=conexion();
      $lista=crearDesplegable($baseDatos);
      echo $lista;
      cerarConexion($baseDatos);
      ?>

    </select><br><br>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nombre=$_POST["nombre"];
      $dni=$_POST["dni"];
      $fecha=$_POST["fecha"];
      $departamento=$_POST["departamento"];

      $baseDatos=conexion();

      insertarEmpleado($baseDatos,$nombre,$dni,$fecha,$departamento);
    }//de if

    ?>
    <input type="submit" name="submit" value="Crear" ><br>

  </form>
</body>
</html>

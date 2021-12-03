<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    ?>

    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      Fecha  <input type="date" name="fecha" required><br><br>
      <input type="submit" name="submit" value="Ver" >
    </form>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $fecha=$_POST["fecha"];

      comprobarEmpleadosEnFecha($fecha,$baseDatos);

    }//de if

    ?>
  </center>
</body>
</html>

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
    $empleados=desplegableEmpleados($baseDatos);
    ?>

    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Empleado <select name="empleados">

        <?php foreach ($empleados->fetchAll() as $row) { ?>

          <option><?php echo $row["dni"];?></option>
        <?php } ?>
      </select><br><br>
      Porcentaje <input type="text" placeholder="Porcentaje de usbida o bajada de sueldo" size="40"name="porcentaje" required><br><br>
      <input type="submit" name="submit" value="Ver" >
    </form>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $dniEmpleado=$_POST["empleados"];
      $porcentajeSubidaBajada=$_POST["porcentaje"];

      modificarSueldoEmpleado($dniEmpleado,$porcentajeSubidaBajada,$baseDatos);
    }//de if

    ?>
  </center>
</body>
</html>

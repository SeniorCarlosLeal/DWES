<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <?php

  require '../Funciones/funciones.php';
  $baseDatos=conexion();
  $departamentosAntiguo=desplegable($baseDatos);
  $departamentosNuevo=desplegable($baseDatos);

  $dniEmpleados=desplegableEmpleados($baseDatos);
   ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Empleado<select name="dni">
    <?php foreach ($dniEmpleados->fetchAll() as $row) { ?>
      <option><?php echo $row["dni"];?></option>
    <?php } ?>
  </select><br>

<h3> se cambia de </h3><br>
    Antiguo Departamento<select name="departamentos">

      <?php foreach ($departamentosAntiguo->fetchAll() as $row) { ?>
        <option><?php echo $row["nombre_dpto"];?></option>
      <?php } ?>

</select><br>
<h3> a</h3><br>

Nuevo Departamento <select name="departamentosNuevo">

  <?php foreach ($departamentosNuevo->fetchAll() as $row) { ?>
    <option><?php echo $row["nombre_dpto"];?></option>
  <?php } ?>

</select><br>
<h3>El día</h3>
Fecha Cambio <input type="text" name="fecha" placeholder="Fecha de cambio"><br><br>

    <input type="submit" name="submit" value="Mover" >
  </form>

  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $dni=$_POST["dni"];
  $departamentoAntiguo=$_POST["departamentos"];
  $departamentoNuevo=$_POST["departamentosNuevo"];
  $fechaCambio=$_POST["fecha"];

  $codDepartamentoAntiguo=conseguirCodDepartamento($departamentoAntiguo,$baseDatos);
  $codDepartamentoNuevo=conseguirCodDepartamento($departamentoNuevo,$baseDatos);

  moverEmpleadoYDepartamento($dni,$codDepartamentoAntiguo,$codDepartamentoNuevo,$fechaCambio,$baseDatos);

  }//de if

  ?>

</body>
</html>

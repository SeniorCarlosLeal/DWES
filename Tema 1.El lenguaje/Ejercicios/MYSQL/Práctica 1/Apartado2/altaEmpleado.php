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
  $desplegable=desplegable($baseDatos);
   ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Dni <input type="text" name="dni" placeholder="DNI"><br><br>
    Nombre <input type="text" name="nombre" placeholder="Nombre"><br><br>
    Apellidos <input type="text" name="apellidos" placeholder="apellidos"><br><br>
    Fecha de Nacimiento <input type="text" name="fecha" placeholder="Fecha de Nacimiento"><br><br>
    Salario <input type="text" name="salario" placeholder="Salario"><br><br>

    <select name="departamentos">

      <?php foreach ($desplegable as $valor) {?>
        <option value="<?php$valor?>"><?php$valor?></option>
      <?php} ?>
</select>

    <input type="submit" name="submit" value="Crear" >
  </form>

  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $dni=$_POST["dni"];
  $nombre=$_POST["nombre"];
  $apellidos=$_POST["apellidos"];
  $fecha=$_POST["fecha"];
  $salario=$_POST["salario"];

  insertarEmpleado($dni,$nombre,$apellidos,$fecha,$salario,$baseDatos);

  }//de if

  ?>

</body>
</html>

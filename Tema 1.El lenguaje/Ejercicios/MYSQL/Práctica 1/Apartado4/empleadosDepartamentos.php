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
    $departamentos=desplegable($baseDatos);
    ?>

    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Departamento <select name="departamentos">

        <?php foreach ($departamentos->fetchAll() as $row) { ?>
          <option><?php echo $row["nombre_dpto"];?></option>
        <?php } ?>
      </select><br><br>
      <input type="submit" name="submit" value="Ver" >
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $departamento=$_POST["departamentos"];
      $codDepartamento=conseguirCodDepartamento($departamento,$baseDatos);

      verListadoEmpleados($codDepartamento,$baseDatos);
    }//de if

    ?>
  </center>
</body>
</html>

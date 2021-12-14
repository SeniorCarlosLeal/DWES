<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Salarios Empleados</title>
</head>
<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    $departamentos=desplegable($baseDatos);
    ?>

    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      Departamentos <select name="dep">

        <?php foreach ($departamentos->fetchAll() as $row) { ?>

          <option><?php echo $row["nombre_dpto"];?></option>
        <?php } ?>
      </select><br><br>
      <input type="submit" name="submit" value="Ver salarios " >
    </form>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $departamento=$_POST["dep"];

      $salariosDepartamentos=verSalariosPorDepartamentos($departamento,$baseDatos);
      $totalSalariosDepartamento=totalSalarioDpto($departamento,$baseDatos);
      ?>
      <table>
        <tr>
          <th>Nombre</th>
          <th>Salario</th>
        </tr>

        <?php foreach ($salariosDepartamentos->fetchAll() as $row) { ?>
          <tr>
            <td><?php echo $row["nombre"];?></td>
            <td><?php echo $row["salario"];?></td>
          </tr>
        <?php } ?>

      </table>

      <h2>Total Salarios del departamento <?php $departamento ?> </h2>


    <?php foreach ($totalSalariosDepartamento->fetchAll() as $row) { ?>
      <p><?php echo $row["sum(salario)"]?><br>

      <?php } ?>


    <?php }//de if  ?>

  </center>
</body>
</html>

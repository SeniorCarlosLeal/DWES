<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Consultar el stock de cada almacen</title>
  <style>
  table, th, td {
    border:2px solid black;
    border-collapse: collapse;
    width: 40%;
    text-align: center;
  }
</style>
</head>

<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    $almacenes=desplegableAlmacenes($baseDatos);
    ?>

    <h2>Almacenar un producto en un almacen </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Almacen <select name="almacenes">

        <?php foreach ($almacenes->fetchAll() as $row) { ?>

          <option value="<?php echo $row["NUM_ALMACEN"] ?>"><?php echo $row["LOCALIDAD"];?></option>
        <?php } ?>
      </select><br><br>




      <input type="submit" name="submit" value="Aceptar ">
    </form><br><br>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $almacen=$_POST["almacenes"];
      $stock= consultarAlmacen($baseDatos,$almacen);
      ?>

      <table>
        <tr>
          <th>Almacen</th>
          <th>Producto</th>
          <th>Cantidad</th>
        </tr>

        <?php foreach ($stock->fetchAll() as $row) { ?>
          <tr>
            <td><?php echo $row["localidad"] ?></td>
            <td><?php echo $row["prod"] ?></td>
            <td><?php echo $row["cantidad"] ?></td>
          </tr>

        <?php } ?>

      </table>


    <?php }//de if  ?>

    <a href="../index.html"><img src="../Imagenes/botonInicio.png" alt="Atras" /></a>

  </center>
</body>
</html>

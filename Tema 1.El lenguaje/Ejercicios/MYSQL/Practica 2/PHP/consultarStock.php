<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Consultar el stock</title>
  <style>
  table, th, td {
    border:2px solid black;
    border-collapse: collapse;
    width: 40%;
  }
</style>
</head>

<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    $almacenes=desplegableAlmacenes($baseDatos);
    $productos=desplegableProductos($baseDatos);
    ?>

    <h2>Consultar el stock de cada producto </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      Producto <select name="productos">

        <?php foreach ($productos->fetchAll() as $row) { ?>

          <option value="<?php echo $row["ID_PRODUCTO"] ?>"><?php echo $row["NOMBRE"];?></option>
        <?php } ?>
      </select><br><br>

      <input type="submit" name="submit" value="Aceptar ">
    </form><br><br>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $producto=$_POST["productos"];

      $stock = consultarStockProducto($baseDatos,$producto);

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

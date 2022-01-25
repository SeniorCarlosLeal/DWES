<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Almacen almacena productos</title>
</head>

<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    $almacenes=desplegableAlmacenes($baseDatos);
    $productos=desplegableProductos($baseDatos);
    ?>

    <h2>Almacenar un producto en un almacen </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Almacen <select name="almacenes">

        <?php foreach ($almacenes->fetchAll() as $row) { ?>

          <option value="<?php echo $row["NUM_ALMACEN"] ?>"><?php echo $row["LOCALIDAD"];?></option>
        <?php } ?>
      </select><br><br>

      Producto <select name="productos">

        <?php foreach ($productos->fetchAll() as $row) { ?>

          <option value="<?php echo $row["ID_PRODUCTO"] ?>"><?php echo $row["NOMBRE"];?></option>
        <?php } ?>
      </select><br><br>

      Cantidad <input type="text" name="cantidad"/><br><br>


      <input type="submit" name="submit" value="Aceptar ">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $almacen=$_POST["almacenes"];
      $producto=$_POST["productos"];
      $cantidad=$_POST["cantidad"];

      insertarAlmacenarProducto($baseDatos,$almacen,$producto,$cantidad);

      ?>

    <?php }//de if  ?>

    <a href="../index.html"><img src="../Imagenes/botonInicio.png" alt="Atras" /></a>

  </center>
</body>
</html>

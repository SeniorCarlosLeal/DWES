<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Compras cliente</title>
</head>

<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    $todoNif=desplegableNif($baseDatos);
    $productos=desplegableProductos($baseDatos);
    ?>

    <h2>Consultar las compras de un cliente </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      Nif clientes <select name="nifs">

        <?php foreach ($todoNif->fetchAll() as $row) { ?>

          <option><?php echo $row["NIF"];?></option>
        <?php } ?>
      </select><br><br>

    Fecha Compra <input type="date" name="fecha" /><br><br>

    Productos <select name="prods">

      <?php foreach ($productos->fetchAll() as $row) { ?>

        <option value="<?php echo $row["ID_PRODUCTO"] ?>"><?php echo $row["NOMBRE"];?></option>
      <?php } ?>
    </select><br><br>

    Cantidad <input type="text" name="cantidad" /><br><br>

      <input type="submit" name="submit" value="Aceptar ">
    </form><br><br>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $cliente=$_POST["nifs"];
      $fecha=$_POST["fecha"];
      $producto=$_POST["prods"];
      $cantidad=$_POST["cantidad"];

      $existencias=comprobarHayProducto($baseDatos,$producto);
      if($existencias>0){
        insertarCompra($baseDatos,$cliente,$fecha,$producto,$cantidad);
      }//de if

      else{ ?>
        <h2>No hay existencias de este producto</h2>
      <?php }//de else   ?>

    <?php }//de if  ?>

    <a href="../index.html"><img src="../Imagenes/botonInicio.png" alt="Atras" /></a>

  </center>
</body>
</html>

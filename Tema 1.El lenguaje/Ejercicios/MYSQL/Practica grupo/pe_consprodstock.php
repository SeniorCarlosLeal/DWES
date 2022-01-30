<?php
require_once("./Funciones/funciones.php");
session_start();
$baseDatos=conexion();
$productos=desplegableProductos($baseDatos);

if(isset($_POST['consultar'])){//si se pulsa consultar
  $prodStock=stockProducto($baseDatos,$_POST['producto']);

  foreach ($prodStock ->fetchAll() as $row) {
    echo "Cantidad --> " . $row["quantityInStock"]."<br><br>";
  }
}//de if

?>
<html>
<head>
  <title>CONSULTAR STOCK</title>
</head>
<body>

  <form name="formulario" method="post" action="pe_consprodstock.php">

    <h1>CONSULTAR STOCK: </h1>

    <label>Producto:</label>

    <select name='producto'>

      <?php foreach ($productos->fetchAll() as $row) { ?>
        <option  value="<?php echo $row["productCode"] ?>"><?php echo $row["productName"];?></option>
      <?php } ?>
    </select><br><br>
    <input type="submit" name="consultar" value="consultar"><br><br>
    <a href='pe_inicio.html'><button type="button" name="button" value="Inicio">Inicio</button></a><br><br>

    <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>

  </form>
</body>
</html>

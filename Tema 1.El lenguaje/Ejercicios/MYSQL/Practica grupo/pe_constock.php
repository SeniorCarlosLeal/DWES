<?php
require_once("./Funciones/funciones.php");
session_start();
$baseDatos=conexion();
$lineasProducto=desplegableLineasProd($baseDatos);

if(isset($_POST['consultar'])){//si se pulsa consultar
  $stockProd=infoStockProd($baseDatos,$_POST['lineas']);

  foreach ($stockProd ->fetchAll() as $row) {
    echo "Producto --> " . $row["productName"] . " Cantidad --> " . $row["quantityInStock"]."<br><br>";
  }
}//de if


?>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Consulta</title>
</head>
<body>
  <?php
  if(isset($_SESSION['customerNumber'])){
    ?>
    <center>
      <form action="pe_constock.php" method="post">

      Tipos Producto <select name="lineas">

        <?php foreach ($lineasProducto->fetchAll() as $row) { ?>

          <option ><?php echo $row["productLine"];?></option>
        <?php } ?>
      </select><br><br>

      <input type="submit" name="consultar" value="Consultar"/><br><br>
      <a href='pe_inicio.html'><button type="button" name="button" value="Inicio">Inicio</button></a>
<br><br>
      <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>


    </form>
    </center>

  <?php }

  else {
    header("location: pe_login.php");

  } ?>
</body>
</html>

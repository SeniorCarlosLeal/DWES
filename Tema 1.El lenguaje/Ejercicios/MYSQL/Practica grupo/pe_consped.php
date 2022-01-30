<?php
require_once("./Funciones/funciones.php");
session_start();
$baseDatos=conexion();
$numCliente=desplegableNumCliente($baseDatos);

  if(isset($_POST['consultar'])){//si se pulsa consultar
    $pedidos=desplegablePedidos($baseDatos,$_POST['clientes']);
     foreach ($pedidos->fetchAll() as $row) {
       $datosPedidos=infoPedidos($baseDatos,$row['orderNumber']);
       echo "Numero de pedido: -> " .  $row['orderNumber'] .  " Fecha del pedido --> ". $row['orderDate'] . " Estado --> " .  $row['status'] . "<br>";
       foreach ($datosPedidos ->fetchAll() as $row2) {
         echo "Linea de pedido --> " . $row2["orderLineNumber"] . " Producto --> " . $row2["productName"] . " Cantidad--> " . $row2["quantityOrdered"] .
          " Precio de unidad --> " . $row2["priceEach"]."<br>";
       }//de for each 2
     }//de for each
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
      <form action="pe_consped.php" method="post">

      Productos <select name="clientes">

        <?php foreach ($numCliente->fetchAll() as $row) { ?>

          <option value="<?php echo $row["customerNumber"] ?>"><?php echo $row["customerName"];?></option>
        <?php } ?>
      </select><br><br>

      <input type="submit" name="consultar" value="Consultar">

    </form><br><br>

    <a href='pe_inicio.html'><button type="button" name="button" value="Inicio">Inicio</button></a>

      <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>

    </center>

  <?php }

  else {
    header("location: pe_login.php");

  } ?>
</body>

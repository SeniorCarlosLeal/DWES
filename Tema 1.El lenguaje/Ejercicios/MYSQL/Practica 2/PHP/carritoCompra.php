<?php
require_once("../Funciones/funciones.php");
session_start();

$baseDatos=conexion();

$productos=desplegableProductos($baseDatos);


  if(isset($_POST['agregar'])){//si se pulsa agregar
    if(!isset($_SESSION['$carrito']) ){//si no hay nada en el carrito , lo creo
      $_SESSION['$carrito']=array(array($_POST['prods'],$_POST['cantidad']));
    }//de if
    else{
      array_push($_SESSION['$carrito'],array($_POST['prods'],$_POST['cantidad']));
    }//de else
    var_dump($_SESSION['$carrito']);

  }//de if

  else if(isset($_POST['vaciar'])){//si se pulsa vaciar del carrito eliminamos todo el carro
    $_SESSION['$carrito']=array();

    var_dump($_SESSION['$carrito']);
  }//de else if

  else if (isset($_POST['comprar'])){//si se pulsa comprar, todos los productos del carrito se van a comprar

    foreach ($_SESSION['$carrito'] as $key => $fila) {
      //insertarCompra($baseDatos,$_SESSION['nif_cliente'],getdate(),$fila[0],$fila[1]);
    }//de foreach
  }//de else if
?>

<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Cesta de la compra</title>
</head>
<body>
  <?php
  if(isset($_SESSION['login_cliente'])){
    ?>
    <center>
      <form action="carritoCompra.php" method="post">

      Productos <select name="prods">

        <?php foreach ($productos->fetchAll() as $row) { ?>

          <option value="<?php echo $row["ID_PRODUCTO"] ?>"><?php echo $row["NOMBRE"];?></option>
        <?php } ?>
      </select><br><br>

      Cantidad <input type="text" name="cantidad" /><br><br>

      <input type="submit" name="agregar" value="Agregar producto">
      <input type="submit" name="vaciar" value="Vaciar carrito">
      <input type="submit" name="comprar" value="Comprar">
    </form>s
      <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>

    </center>

  <?php }

  else {
    header("location: ./loginCliente.php");

  } ?>
</body>
</html>

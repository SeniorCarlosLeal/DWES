<?php

require_once("./Funciones/funciones.php");
session_start();
$baseDatos=conexion();
$articulosStock=desplegableArtStock($baseDatos);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['agregar'])){//si se pulsa agregar
    if(!isset($_SESSION['$carrito']) ){//si no hay nada en el carrito , lo creo
      $_SESSION['$carrito']=[$_POST['stockProd'] => $_POST['cantidad']];
    }//de if
    else{
      $_SESSION['$carrito'][$_POST['stockProd']] = $_POST['cantidad'];
    }//de else

    var_dump($_SESSION['$carrito']);
  }//de if

  else if(isset($_POST['vaciar'])){//si se pulsa vaciar
    $_SESSION['$carrito']=array();
    var_dump($_SESSION['$carrito']);

  }//de vaciar

  else if(isset($_POST['comprar'])){
    $tarjetaOk=comprobarFormatoTarjeta($_POST["numPago"]);

    if($tarjetaOk==0){
      echo "Compra no realizada";
    }

    else{
      foreach ($_SESSION['$carrito'] as $codProd => $cantidad) {
        actualizarStock($baseDatos,$codProd,$cantidad);
      }//de for each
      $numeroPedido=numeroMaxPedido($baseDatos);

      foreach ($numeroPedido ->fetchAll() as $row) {
        $num=$row['Max']+1;
      }//de for each
      $fecha=date("Y/m/d");

      insertarPedido($baseDatos,$num,$fecha,$_SESSION['customerNumber'],$_POST['numPago'],$_SESSION['$carrito']);

    }//de else
  }//de else
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
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        Productos en stock <select class="" name="stockProd">
          <?php
          foreach ($articulosStock ->fetchAll() as $row) { ?>
            <option value="<?php echo $row["productCode"] ?>"><?php echo $row["productName"];?></option>
          <?php  }//de foreach  ?>
        </select><br><br>

        Cantidad <input type="text" name="cantidad" value="" ><br><br>
        Nº de pago <input type="text" name="numPago" value=""><br><br>


        <input type="submit" name="agregar" value="Agregar a la cesta"/><br><br>
        <input type="submit" name="vaciar" value="Vaciar cesta"/><br><br>
        <input type="submit" name="comprar" value="Comprar"/><br><br>
        <a href='pe_inicio.html'><button type="button" name="button" value="Inicio">Inicio</button></a><br><br>

        <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>


      </form>
    </center>

  <?php }

  else {
    header("location: pe_login.php");

  } ?>
</body>
</html>

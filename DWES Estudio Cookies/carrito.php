<?php
if(isset($_COOKIE['usuario'])){
  require_once("./Funciones/funciones.php");
  $baseDatos=conexion();
  $desplegableProductos=desplegableProductos($baseDatos);

  if(isset($_POST['agregar'])){
    if(!isset($_COOKIE['carrito'])){
      $carrito=array(array($_POST['productos'],$_POST['cantidad'] ) );
      //var_dump($carrito);
      setcookie('carrito',json_encode($carrito),time() + (86400 * 30), "/");
    }//de if
    else{
      $cesta=json_decode($_COOKIE['carrito'],true);
      array_push($cesta,array($_POST['productos'],$_POST['cantidad']));
      setcookie('carrito',json_encode($cesta),time() + (86400 * 30), "/");
    }//de else

    if(isset($_COOKIE['carrito'])){
      $cesta=json_decode($_COOKIE['carrito'],true);
      var_dump($cesta);
    }//de if
  }//de if
  ?>
  <html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form  action="carrito.php" method="post">
      Productos <select class="" name="productos">
        <?php foreach ($desplegableProductos->fetchAll() as $row) { ?>
          <option value="<?php echo $row["productCode"] ?>"><?php echo $row["productName"];?></option>
        <?php } ?>
      </select><br><br>

      Cantidad <input type="text" name="cantidad" value=""><br><br>

      <input type="submit" name="agregar" value="Agregar a la cesta"><br><br>
      <input type="submit" name="vaciar" value="Vaciar cesta"><br><br>
      <input type="submit" name="comprar" value="Comprar"><br><br>

    </form>
  </body>
  </html>

  <?php


}//de if
else{
  header("location: login.php");
}
?>

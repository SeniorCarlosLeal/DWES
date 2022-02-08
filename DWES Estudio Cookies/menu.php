<?php

if(isset($_COOKIE["usuario"])){ ?>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <a href="carrito.php">Comprar productos</a><br><br>
      <a href="cerrarSesion.php"> <input type="button" name="" value="Cerrar sesion"> </a>
    </body>
  </html>
<?php }

else{
  header("location: login.php");
}

 ?>

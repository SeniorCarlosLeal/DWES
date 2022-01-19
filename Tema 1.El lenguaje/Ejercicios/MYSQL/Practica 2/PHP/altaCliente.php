<!DOCTYPE html>
<?php
require '../Funciones/funciones.php';
?>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Alta cliente</title>
</head>

<body>
  <center>
    <?php


    $baseDatos=conexion();
    ?>

    <h2>Dar de alta a un cliente </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      NIF <input type="text" name="nif" /><br><br>
      Nombre <input type="text" name="nombre" /><br><br>
      Apellidos <input type="text" name="apellidos" /><br><br>
      Código Postal <input type="text" name="cp" /><br><br>
      Dirección <input type="text" name="dir" /><br><br>
      Ciudad <input type="text" name="ciudad" /><br><br>
      <a href="nuevaPagina.php">
        <input type="submit" name="submit" value="Aceptar ">
      </a>
    </form><br><br>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $nif=$_POST["nif"];
      $nombre=$_POST["nombre"];
      $apellidos=$_POST["apellidos"];
      $codPostal=$_POST["cp"];
      $direccion=$_POST["dir"];
      $ciudad=$_POST["ciudad"];
      insertarCliente($baseDatos, $nif,$nombre,$apellidos,$codPostal,$direccion,$ciudad);      
      ?>

    <?php }//de if  ?>

    <a href="../index.html"><img src="../Imagenes/botonInicio.png" alt="Atras" /></a>

  </center>
</body>
</html>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Salarios Empleados</title>
</head>

<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    ?>

    <h2>Dar de alta un almacén </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Localidad del almacén <input type="text" name="localidad" placeholder="Localidad"><br><br>
      <input type="submit" name="submit" value="Aceptar " >
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $localidad=$_POST["localidad"];

      insertarAlmacen($baseDatos,$localidad);
      ?>

    <?php }//de if  ?>

    <a href="../index.html"><img src="../Imagenes/botonInicio.png" alt="Atras" /></a>

  </center>
</body>
</html>

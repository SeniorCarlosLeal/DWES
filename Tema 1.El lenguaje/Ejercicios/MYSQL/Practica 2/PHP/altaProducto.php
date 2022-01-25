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
    $categorias=desplegableCategoria($baseDatos);
    ?>

    <h2>Dar de alta un producto </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Nombre de producto <input type="text" name="nombreProd" placeholder="Nombre"><br><br>
      Precio del producto <input type="text" name="precioProd" placeholder="Precio"><br><br>

      Categoría <select name="cate">

        <?php foreach ($categorias->fetchAll() as $row) { echo $row["ID_CATEGORIA"];?>

          <option value="<?php echo $row["ID_CATEGORIA"]; ?>"> <?php echo $row["NOMBRE"]; ?> </option>
        <?php } ?>
      </select><br><br>

      <input type="submit" name="submit" value="Aceptar " >
    </form>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $nombreProd=$_POST["nombreProd"];
      $precioProd=$_POST["precioProd"];
      $categoria=$_POST["cate"];
       insertarProducto($baseDatos,$nombreProd,$precioProd,$categoria);
      ?>



    <?php }//de if  ?>

    <a href="../index.html"><img src="../Imagenes/botonInicio.png" alt="Atras" /></a>
  </center>
</body>
</html>

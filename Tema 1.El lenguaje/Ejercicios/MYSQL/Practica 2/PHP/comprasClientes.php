<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Compras cliente</title>
  <style>
  table, th, td {
    border:2px solid black;
    width: 30%;
    border-collapse: collapse;
    text-align: center;
  }
</style>
</head>

<body>
  <center>
    <?php

    require '../Funciones/funciones.php';
    $baseDatos=conexion();
    $todoNif=desplegableNif($baseDatos);
    ?>

    <h2>Consultar las compras de un cliente </h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      Nif clientes <select name="nifs">

        <?php foreach ($todoNif->fetchAll() as $row) { ?>

          <option><?php echo $row["NIF"];?></option>
        <?php } ?>
      </select><br><br>

      Fecha Inicio <input type="date" name="inicio" /><br><br>
      Fechga Fin <input type="date" name="fin" /><br><br>

      <input type="submit" name="submit" value="Aceptar ">
    </form><br><br>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $cliente=$_POST["nifs"];
      $fechaInicio=$_POST["inicio"];
      $fechaFin=$_POST["fin"];
      $comprasClientes=consultarComprasCliente($baseDatos,$cliente,$fechaInicio,$fechaFin); ?>

      <table>
        <th>Producto</th>
        <th>Fecha de compra</th>
        <th>Cantidad</th>

        <?php foreach ($comprasClientes->fetchAll() as $row) { ?>
          <tr>
            <td><?php echo $row["Producto"] ?></td>
            <td><?php echo $row["Fecha"] ?></td>
            <td><?php echo $row["Cantidad"] ?></td>
          </tr>

        <?php } ?>

      </table>

    <?php }//de if  ?>

    <a href="../index.html"><img src="../Imagenes/botonInicio.png" alt="Atras" /></a>

  </center>
</body>
</html>

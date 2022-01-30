<?php
require_once("./Funciones/funciones.php");
session_start();
$baseDatos=conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $productos=productosTotales($baseDatos,$_POST["fechaIni"],$_POST["fechaFin"]);

  foreach ($productos ->fetchAll() as $row) {
    echo "Producto --> " . $row['PRODUCTNAME'] . " Cantidad Ordenada --> " . $row['Cantidad'] ."<br><br>";
  }//de foreach


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

        Fecha Inicial  <input type="date" name="fechaIni" required><br><br>

        Fecha Final  <input type="date" name="fechaFin" required><br><br>

        <input type="submit" name="consultar" value="Consultar"/><br><br>
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

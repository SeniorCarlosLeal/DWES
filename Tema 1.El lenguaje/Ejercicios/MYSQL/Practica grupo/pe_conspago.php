<?php

require_once("./Funciones/funciones.php");
session_start();
$baseDatos=conexion();
$clientes=desplegableNumCliente($baseDatos);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if($_POST['fechaIni']=="" && $_POST['fechaFin']==""){//historico

    $sumaTotal=0;
    $pedidosEntreFechas=todoPedidos($baseDatos,$_SESSION["customerNumber"]);
      foreach ($pedidosEntreFechas ->fetchAll() as $row) {
        echo "El día ". $row["paymentDate"] . "  Cantidad --> " . $row["Total"]."<br><br>";
        $sumaTotal+=$row["Total"];
      }//de foreach
      echo "Total: ".$sumaTotal;
  }//de if


  else{
    $sumaTotal=0;
    $pedidosEntreFechas=pedidosEntreFechas($baseDatos,$_POST["fechaIni"],$_POST["fechaFin"],$_SESSION["customerNumber"]);
      foreach ($pedidosEntreFechas ->fetchAll() as $row) {
        echo "El día ". $row["paymentDate"] . "  Cantidad --> " . $row["Total"]."<br><br>";
        $sumaTotal+=$row["Total"];
      }//de foreach
      echo "Total: ".$sumaTotal;
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

        Fecha Inicial  <input type="date" name="fechaIni"><br><br>

        Fecha Final  <input type="date" name="fechaFin"><br><br>

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

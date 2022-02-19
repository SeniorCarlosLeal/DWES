<?php
if(isset($_COOKIE['empleado'])){
  require_once("../models/modelo.php");
  $baseDatos=conexion();
  $departamentos=departamentos($baseDatos);

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $jefes=consultarJefes($baseDatos,$_POST['departamentos']);
    $empleados=consultarEmpleados($baseDatos,$_POST['departamentos']);
    require_once("../views/informacionDepartamentoVistaPag2.phtml");
  }//de if
    require_once("../views/informacionDepartamentoVista.phtml");
}//de if
else{
  header("location: ./loginController.php");
}//de else

?>

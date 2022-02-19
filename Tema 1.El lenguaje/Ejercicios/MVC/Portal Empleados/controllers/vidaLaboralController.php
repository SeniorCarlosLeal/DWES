<?php
if(isset($_COOKIE['empleado'])){
  require_once("../models/modelo.php");
  $baseDatos=conexion();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $numEmpleado=$_POST['numEmpleado'];
    require_once("../models/modelo.php");
    $existe=existeNumEmpleado($baseDatos,$numEmpleado);
    if($existe==1){
      $vidaLaboral=verVidaLaboral($baseDatos,$numEmpleado);
      require_once("../views/vidaLaboralVistaPag2.phtml");
    }//de if
    else{
      echo "El numero de empleado introducido no existe";
    }//de else
  }//de if
    require_once("../views/vidaLaboralVista.phtml");
}//de if
else{
  header("location: ./loginController.php");
}//de else


?>

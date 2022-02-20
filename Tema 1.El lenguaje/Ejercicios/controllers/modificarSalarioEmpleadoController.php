<?php
if(isset($_COOKIE['empleado'])){
  require_once("../models/modelo.php");
  $baseDatos=conexion();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $numEmpleado=$_POST['numEmpleado'];
    require_once("../models/modelo.php");
    $existe=existeNumEmpleado($baseDatos,$numEmpleado);
    if($existe==1){
      actualizarSueldo($baseDatos,$numEmpleado,$_POST['newSalary']);
    }//de if
    else{
      echo "El numero de empleado introducido no existe";
    }//de else
  }//de if
    require_once("../views/modificarSalarioEmpleadoVista.phtml");
}//de if
else{
  header("location: ./loginController.php");
}//de else


?>

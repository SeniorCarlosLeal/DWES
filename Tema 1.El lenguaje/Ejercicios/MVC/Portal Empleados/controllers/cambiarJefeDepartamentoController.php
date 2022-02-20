<?php
if(isset($_COOKIE['empleado'])){
  require_once("../models/modelo.php");
  $baseDatos=conexion();
  $departamentos=departamentos($baseDatos);

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $existe=existeNumEmpleado($baseDatos,$_POST['numEmpleado']);
    if ($existe==1) {
      $jefeAntiguo=buscarJefeAntiguo($baseDatos,$_POST['newDepartment']);
        /*  Update en tabla dept_manageer donde antiguo jefe la fecha fin es fecha actual
            insert en tabla dept_manager con nuevo empleado*/
        actualizarFechaFinJefe($baseDatos,$jefeAntiguo,$_POST['newDepartment']);
        insertarNuevoJefe($baseDatos,$_POST['numEmpleado'],$_POST['newDepartment']);
    }//de if
    else{
      echo "No existe empleado con dicho numero";
    }//de else
  }//de if
    require_once("../views/cambioJefeDepartamentoVista.phtml");
}//de if
else{
  header("location: ./loginController.php");
}//de else

?>

<?php
if(isset($_COOKIE['empleado'])){
  require_once("../models/modelo.php");
  $baseDatos=conexion();
  $departamentos=departamentos($baseDatos);

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $existe=existeNumEmpleado($baseDatos,$_POST['numEmpleado']);
    if ($existe==1) {
      $deptAntiguo=combrobarDepartamentosNuevoYAntiguo($baseDatos,$_POST['numEmpleado']);
      if($deptAntiguo==$_POST['newDepartment']){
        echo "El departamento antiguo y el nuevo son el mismo";
      }//de if
      else{
        /*  Update en tabla dept_emp donde antiguo dept fecha fin es fecha actual
            insert en tabla dept_emp con uevo dept para el empleado*/
        actualizarFechaFinDeptEmp($baseDatos,$_POST['numEmpleado'],$deptAntiguo);
        insertarEnDepartamentoEmpleado($baseDatos,$_POST['numEmpleado'],$_POST['newDepartment']);
      }//de else
    }//de if
    else{
      echo "No existe empleado con dicho numero";
    }//de else
  }//de if
    require_once("../views/cambioDepartamentoVista.phtml");
}//de if
else{
  header("location: ./loginController.php");
}//de else

?>

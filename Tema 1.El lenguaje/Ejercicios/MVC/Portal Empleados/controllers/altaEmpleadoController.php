<?php

if(isset($_COOKIE['empleado'])){
  require_once("../models/modelo.php");
  $baseDatos=conexion();
  $departamentos=departamentos($baseDatos);
  $cargos=cargos($baseDatos);
  require_once("../views/altaEmpleadoVista.phtml");

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    /*1 Insertar en tabla empleados
      2 Insertar en dept_emp
      3 Insertar salario en salaries
      4 Insertar cargo en titles*/
      $numeroEmp=numeroEmpleado($baseDatos);
      insertarEnEmpleados($baseDatos,$numeroEmp,$_POST['date'],$_POST['name'],$_POST['lastName'],$_POST['mf']);
      insertarEnDepartamentoEmpleado($baseDatos,$numeroEmp,$_POST['depart']);
      insertarEnSalarios($baseDatos,$numeroEmp,$_POST['salary']);
      insertarCargo($baseDatos,$numeroEmp,$_POST['cargo']);
  }//de if
}//de if
else{
  header("location: ./loginController.php");
}//de else


?>

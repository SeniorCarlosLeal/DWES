<?php
if(isset($_COOKIE['empleado'])){
  require_once("../models/modelo.php");
  $baseDatos=conexion();
  $departamentos=departamentos($baseDatos);
  $cargos=cargos($baseDatos);

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    /*Si se pulsa agregar añadimos a la cesta
    Si se pulsa vaciar vaciamos cesta
    Si se pulsa dar de alta:
    recorremos la cesta y por cada empleado
    1 Insertar en tabla empleados
    2 Insertar en dept_emp
    3 Insertar salario en salaries
    4 Insertar cargo en titles
    5 Vaciamos cesta una vez se hayan dado de alta todos los empleados*/
    if(isset($_POST['agregar'])){
      if(!isset($_COOKIE['carrito'])){
        $numeroEmp=numeroEmpleado($baseDatos);
        $empleadosADarDeAlta=array();
        array_push($empleadosADarDeAlta,array($numeroEmp,$_POST['name'],$_POST['lastName'],$_POST['mf'],$_POST['date'],$_POST['depart'],$_POST['salary'],$_POST['cargo']));
        var_dump($empleadosADarDeAlta);
        setcookie("carrito",json_encode($empleadosADarDeAlta),time()+(86400*30),"/");
      }//de if
      else{
        $empleados=json_decode($_COOKIE['carrito'],true);
        $tamanio=count($empleados);
        $numeroEmp=numeroEmpleado($baseDatos)+$tamanio;
        array_push($empleados,array($numeroEmp,$_POST['name'],$_POST['lastName'],$_POST['mf'],$_POST['date'],$_POST['depart'],$_POST['salary'],$_POST['cargo']));
        var_dump($empleados);
        setcookie("carrito",json_encode($empleados),time()+(86400*30),"/");
      }//de else
    }//de if
    else  if(isset($_POST['vaciar'])){
      setcookie("carrito","",time() - 3600,"/");
    }//de if

    else if(isset($_POST['darAlta'])){
      $empleados=json_decode($_COOKIE['carrito'],true);
      $tamanio=count($empleados);
      for ($i=0; $i < $tamanio; $i++) {
        insertarEnEmpleados($baseDatos,$empleados[$i][0],$empleados[$i][4],$empleados[$i][1],$empleados[$i][2],$empleados[$i][3]);
        insertarEnDepartamentoEmpleado($baseDatos,$empleados[$i][0],$empleados[$i][5]);
        insertarEnSalarios($baseDatos,$empleados[$i][0],$empleados[$i][6]);
        insertarCargo($baseDatos,$empleados[$i][0],$empleados[$i][7]);
      }//de for
      $empleados=array();
      setcookie("carrito",json_encode($empleados),time()+(86400*30),"/");
    }//de if
  }//de if

  /*Lo ponemos aqui ya que cookies siempre en la cabecera*/
  require_once("../views/altaMasivaEmpleadosVista.phtml");
}//de if
  else{
    header("location: ./loginController.php");
  }//de else
  ?>

<?php

function conexion(){

  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "empleadosnn";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }

  return $conn;
}//de function

//---------------------------------------------------------------

function errores($error){

}//de fucntion

//-------------------------------------------------------------------


function insertarDepartamento($nombreDepartamento,$baseDatos){

  $clave=generaClave($baseDatos);

  try{
    $stmt = $baseDatos->prepare("INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES (:codigo,:nombre)");
    $stmt->bindParam(':codigo', $codDpto);
    $stmt->bindParam(':nombre', $nombreDpto);

    $codDpto=$clave;
    $nombreDpto=$nombreDepartamento;

    $stmt->execute();

    echo "Departamento insertado correctamente";

  }//de try

  catch(PDOException $error)
  {
    errores($error);
  }

}//de ufnction

//------------------------------------------------------

function generaClave($baseDatos){

  $stmt = $baseDatos->prepare("SELECT nombre_dpto FROM departamento");
  $stmt->execute();
  $salida=0;

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    $salida++;
  }//de foreach

  return "D".str_pad($salida+1,3,"0",STR_PAD_LEFT);

}//de function

//-----------------------------------------------------------

function insertarEmpleado($dni,$nombre,$apellidos,$fecha,$salario,$baseDatos){

  try{
    $stmt = $baseDatos->prepare("INSERT INTO empleado (dni,nombre,apellidos,fecha_nac,salario) VALUES (:dni,:nombre,:apellidos,:fecha,:salario)");
    $stmt->bindParam(':dni', $dniEmp);
    $stmt->bindParam(':nombre', $nombreEmp);
    $stmt->bindParam(':apellidos', $apellidosEmp);
    $stmt->bindParam(':fecha', $fechaEmp);
    $stmt->bindParam(':salario', $salarioEmp);

    $dniEmp=$dni;
    $nombreEmp=$nombre;
    $apellidosEmp=$apellidos;
    $fechaEmp=$fecha;
    $salarioEmp=$salario;

    $stmt->execute();

    echo "Empleado insertado correctamente";

  }//de try

  catch(PDOException $error)
  {
    errores($error);
  }

}//de function

//-------------------------------------------------------------------------------------------


function desplegable($baseDatos){

  $stmt = $baseDatos->prepare("SELECT nombre_dpto FROM departamento");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt->fetchAll();

}//de function

///-----------------------------------------

function cerrarConexion($baseDatos){

  $baseDatos=null;

}//de function


?>

<?php

function conexion(){

  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "empleados1n";

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

//-------------------------------

function comprobarDepartamento($departamento,$baseDatos){
  $stmt = $baseDatos->prepare("SELECT nombre_departamento FROM departamento");
  $stmt->execute();
  $salida=0;

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    if($row["nombre_departamento"]==$departamento){
      $salida=1;
    }//de if
  }//de foreach

  return $salida;
}//de ufcntion

//-----------------------------------------

function insertarEmpleado($baseDatos,$nombre,$dni,$fecha,$departamento){

  try{
    $stmt = $baseDatos->prepare("INSERT INTO empleado (dni,nombre_empleado,fecha_nacimiento,departamento) VALUES (:dni,:nombre,:fecha,:departamento)");
    $stmt->bindParam(':dni', $dniEmp);
    $stmt->bindParam(':nombre', $nombreEmpleado);
    $stmt->bindParam(':fecha', $fechaEmp);
    $stmt->bindParam(':departamento', $departamentoEmp);

    $dniEmp=$dni;
    $nombreEmpleado=$nombre;
    $fechaEmp=$fecha;
    $departamentoEmp=$departamento;

    $stmt->execute();

    echo "Empleado insertado correctamente";

  }//de try

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}//de function

//--------------------------------------------

function cerarConexion($baseDatos){
  $baseDatos=null;
}

//------------------------------------------------

function crearDesplegable($baseDatos){
  $salida="";
  $stmt = $baseDatos->prepare("SELECT nombre_departamento FROM departamento");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
$salida=$salida . "<option value=".$row["nombre_departamento"].">". $row["nombre_departamento"]."</option><br>";
  }//de foreach
  return $salida ;
}//de function

?>

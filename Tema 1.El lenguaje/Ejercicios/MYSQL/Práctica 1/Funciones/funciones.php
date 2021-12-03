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

  return $stmt;

}//de function

///-----------------------------------------

function cerrarConexion($baseDatos){

  $baseDatos=null;

}//de function

//---------------------------------------------------

function conseguirCodDepartamento($departamento,$baseDatos){
  $stmt = $baseDatos->prepare("SELECT cod_dpto FROM departamento where nombre_dpto like '$departamento'");
  $stmt->execute();
  $salida="";

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    $salida=$row["cod_dpto"];
  }//de foreach
  return $salida;
}//de function

//---------------------------------------------------------

function insertarEmpleadoYDepartamento($codDepartamentoIntroducido,$dni,$fechaIni,$fechaFin,$baseDatos){
  try{
    $stmt = $baseDatos->prepare("INSERT INTO emple_depart(dni,cod_dpto,fecha_ini) VALUES (:dni,:cod,:inicio)");

    $stmt->bindParam(':dni', $dniEmp);
    $stmt->bindParam(':cod', $codDpto);
    $stmt->bindParam(':inicio', $inicioEmp);

    $dniEmp=$dni;
    $codDpto=$codDepartamentoIntroducido;
    $inicioEmp=$fechaIni;

    $stmt->execute();

    echo "Empleado insertado correctamente";

  }//de try

  catch(PDOException $error)
  {
    $error=$error->getCode();
    errores($error);
  }
}//de function

//------------------------------

function desplegableEmpleados($baseDatos){
  $stmt = $baseDatos->prepare("SELECT dni FROM empleado");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;
}//de function

//----------------------------------

function moverEmpleadoYDepartamento($dni,$codDepartamentoNuevo,$fechaCambio,$baseDatos){
  actualizarFechas($dni,$fechaCambio,$baseDatos);

  insertarEmpleadoYDepartamento($codDepartamentoNuevo,$dni,$fechaCambio,null,$baseDatos);


}//de fucntion

//--------------------------------------------

function actualizarFechas($dni,$fechaCambio,$baseDatos){

  try {

    $sql = "UPDATE emple_depart SET fecha_fin='$fechaCambio' WHERE dni like '$dni' and fecha_fin is NULL";

    $stmt = $baseDatos->prepare($sql);

    $stmt->execute();

    echo  " El empleado se ha cambiado de departamento correctamente";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

}//de fucntion

//--------------------------------------------

function verListadoEmpleados($departamento,$baseDatos){

  $stmt = $baseDatos->prepare("SELECT empleado.nombre FROM empleado,emple_depart,departamento
    where empleado.dni=emple_depart.dni
    and departamento.cod_dpto=emple_depart.cod_dpto
    and '$departamento'=emple_depart.cod_dpto and emple_depart.fecha_fin is NULL");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $row) {
      echo $row ["nombre"] ."<br>";
    }//de foreach
  }//de function

  //-----------------------------------------------------

  function verListadoHistoricoEmpleados($codDepartamento,$baseDatos){
    $stmt = $baseDatos->prepare("SELECT empleado.nombre FROM empleado,emple_depart,departamento
      where empleado.dni=emple_depart.dni
      and departamento.cod_dpto=emple_depart.cod_dpto
      and '$codDepartamento'=emple_depart.cod_dpto and emple_depart.fecha_fin is not NULL");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach($stmt->fetchAll() as $row) {
        echo $row ["nombre"] ."<br>";
      }//de foreach
    }//de function

    //-----------------------------------

    function modificarSueldoEmpleado($dniEmpleado,$porcentajeSubidaBajada,$baseDatos){
      try {
        $sql = "UPDATE empleado SET salario=(salario * '$porcentajeSubidaBajada')/100 WHERE dni='$dniEmpleado'";

        $stmt = $baseDatos->prepare($sql);

        $stmt->execute();

        echo  " El empleado se ha cambiado de departamento correctamente";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    }//de function

    //-------------------------------------------

    function comprobarEmpleadosEnFecha($fecha,$baseDatos){
      try{

        $stmt = $baseDatos->prepare("SELECT nombre,nombre_dpto FROM empleado,departamento,emple_depart
        WHERE empleado.dni = emple_depart.dni AND departamento.cod_dpto = emple_depart.cod_dpto
        AND '$fecha'>=emple_depart.fecha_ini
		     AND '$fecha'<=ifnull(emple_depart.fecha_fin,'2221-12-12 00:00:00')");

          $stmt->execute();
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

          foreach($stmt->fetchAll() as $row) {
            echo $row ["nombre"]. " ==> " . $row["nombre_dpto"] ."<br>";
          }//de foreach
        }//de try

        catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
      }//de function


      ?>

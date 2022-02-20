<?php
function conexion(){
  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "employees";
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
}//de conexion
//-------------------------------
function existeEmpleado($baseDatos,$usuario,$contrasenia){
  try{
    $stmt = $baseDatos->prepare("SELECT employees.emp_no as 'id',last_name,departments.dept_no,dept_name
      from employees,departments,dept_emp
      where employees.emp_no=dept_emp.emp_no and departments.dept_no=dept_emp.dept_no and dept_name='Human Resources'
      and employees.emp_no='$usuario' and last_name='$contrasenia'");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $salida=0;
      $id="";
      foreach($stmt->fetchAll() as $row) {
        $id=$row['id'];
        $salida++;
      }//de foreach
      return [$salida,$id];
    }//de try

    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
  }//de validoInicio
  //------------------------------------------
  function departamentos($baseDatos){
    try{
      $stmt = $baseDatos->prepare("SELECT dept_no,dept_name FROM departments");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;
    }//de try
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
  }//de departamentos
  ///////////////////////////////////////////////////
  function cargos($baseDatos){
    try{
      $stmt = $baseDatos->prepare("SELECT distinct title FROM titles");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;
    }//de try
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
  }//de cargos
  //--------------------------------------------------------------

  function insertarEnEmpleados($baseDatos,$numeroEmpleado,$cumple,$firstName,$lastName,$gender){
    try{
      $stmt = $baseDatos->prepare("INSERT INTO employees (emp_no,birth_date,first_name,last_name,gender,hire_date) VALUES (:numero,:cumpleanios,:nombre,:apellido,:genero,:fechaContrato)");
      $stmt->bindParam(':numero', $numero);
      $stmt->bindParam(':cumpleanios', $cumpleanios);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellido', $apellido);
      $stmt->bindParam(':genero', $genero);
      $stmt->bindParam(':fechaContrato', $fechaContrato);

      $numero=$numeroEmpleado;
      $cumpleanios=$cumple;
      $nombre=$firstName;
      $apellido=$lastName;
      $genero=$gender;
      $fechaContrato=date("Y/m/d");
      $stmt->execute();
    }//de try
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
  }//de fucntion
//------------------------------------

function numeroEmpleado($baseDatos){
  try{
    $stmt = $baseDatos->prepare("SELECT max(emp_no) as 'numero' from employees");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $salida="";
      foreach($stmt->fetchAll() as $row) {
        $salida=$row['numero'];
      }//de foreach
      return $salida+1;
    }//de try

    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
}//de function
//----------------------------------------
function insertarEnDepartamentoEmpleado($baseDatos,$numeroEmp,$departCode){
  try{
    $stmt = $baseDatos->prepare("INSERT INTO dept_emp (emp_no,dept_no,from_date,to_date) VALUES (:numero,:departamento,:fechaDesde,:fechaHasta)");
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':departamento', $departamento);
    $stmt->bindParam(':fechaDesde', $fechaDesde);
    $stmt->bindParam(':fechaHasta', $fechaHasta);

    $numero=$numeroEmp;
    $departamento=$departCode;
    $fechaDesde=date("Y/m/d");
    $fechaHasta='9999/01/01';
    $stmt->execute();
  }//de try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }//de catch
}//de insertar
//---------------------------------------------

function insertarEnSalarios($baseDatos,$numeroEmp,$salary){
  try{
    $stmt = $baseDatos->prepare("INSERT INTO salaries (emp_no,salary,from_date,to_date) VALUES (:numero,:salario,:fechaDesde,:fechaHasta)");
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':fechaDesde', $fechaDesde);
    $stmt->bindParam(':fechaHasta', $fechaHasta);

    $numero=$numeroEmp;
    $salario=$salary;
    $fechaDesde=date("Y/m/d");
    $fechaHasta='9999/01/01';
    $stmt->execute();
  }//de try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }//de catch
}//de insertar
//-------------------------------------------

function insertarCargo($baseDatos,$numeroEmp,$charge){
  try{
    $stmt = $baseDatos->prepare("INSERT INTO titles (emp_no,title,from_date,to_date) VALUES (:numero,:titulo,:fechaDesde,:fechaHasta)");
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':fechaDesde', $fechaDesde);
    $stmt->bindParam(':fechaHasta', $fechaHasta);

    $numero=$numeroEmp;
    $titulo=$charge;
    $fechaDesde=date("Y/m/d");
    $fechaHasta='9999/01/01';
    $stmt->execute();
  }//de try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }//de catch
}//de insertar
//------------------------------------------------------
function existeNumEmpleado($baseDatos,$numEmpleado){
  try{
    $stmt = $baseDatos->prepare("SELECT emp_no as 'numero' from employees where emp_no='$numEmpleado'");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $salida=0;
      foreach($stmt->fetchAll() as $row) {
        $salida++;
      }//de foreach
      return $salida;
    }//de try

    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
}//de fucntion
//-------------------------------------------------
function actualizarSueldo($baseDatos,$numEmpleado,$newSalary){
  try {
     $sql = "UPDATE salaries SET salary='$newSalary' WHERE emp_no='$numEmpleado'";
     $stmt = $baseDatos->prepare($sql);
     $stmt->execute();
   }//de try
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
   }//de catch
}//de fucntion
//--------------------------------------------------
function verVidaLaboral($baseDatos,$numEmpleado){
  try{
    $stmt = $baseDatos->prepare("SELECT * FROM dept_emp where emp_no='$numEmpleado'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt;
    }//de try

    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
}//de ver vida laboral
//--------------------------------------------------
function consultarJefes($baseDatos,$departamento){
  try{
    $stmt = $baseDatos->prepare("SELECT employees.emp_no as 'num',first_name,last_name,gender,birth_date,hire_date FROM employees,dept_manager
       where employees.emp_no=dept_manager.emp_no and dept_no='$departamento' and year(to_date)='9999'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt;
    }//de try

    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
}//de fucntion

//-------------------------------------------------
function consultarEmpleados($baseDatos,$departamentos){
  try{
    $stmt = $baseDatos->prepare("SELECT employees.emp_no as 'num',first_name,last_name,gender,birth_date,hire_date FROM employees,dept_emp,departments
       where employees.emp_no=dept_emp.emp_no and departments.dept_no=dept_emp.dept_no and (employees.emp_no not in(select emp_no from dept_manager)) and year(to_date)='9999'
       and dept_emp.dept_no='$departamentos'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt;
    }//de try

    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
}//de consultar
//------------------------------------------------
function combrobarDepartamentosNuevoYAntiguo($baseDatos,$numEmpleado){
  try{
    $stmt = $baseDatos->prepare("SELECT departments.dept_no as 'dept' from employees,dept_emp,departments
       where employees.emp_no=dept_emp.emp_no and departments.dept_no=dept_emp.dept_no and employees.emp_no='$numEmpleado'");
      $stmt->execute();

      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $salida="";
      foreach($stmt->fetchAll() as $row) {
        $salida=$row['dept'];
      }//de foreach
      return $salida;
    }//de try

    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }//de catch
}//de fucntion
//------------------------------------------------
function actualizarFechaFinDeptEmp($baseDatos,$numEmpleado,$newDepartment){
  try {
    $fecha=date("Y/m/d");
     $sql = "UPDATE dept_emp SET to_date='$fecha' WHERE emp_no='$numEmpleado' and dept_no='$newDepartment' and year(to_date)='9999'";
     $stmt = $baseDatos->prepare($sql);
     $stmt->execute();
   }//de try
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
   }//de catch
}//de fucntion
//------------------------------------------------------
function buscarJefeAntiguo($baseDatos,$newDepartment){
  try{
  $stmt = $baseDatos->prepare("SELECT emp_no from dept_manager where dept_no='$newDepartment' and year(to_date)='9999'");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $salida="";
    foreach($stmt->fetchAll() as $row) {
      $salida=$row['emp_no'];
    }//de foreach
    return $salida;
  }//de try

  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }//de catch
}//de fucntion
//-------------------------------------
function actualizarFechaFinJefe($baseDatos,$jefeAntiguo,$department){
  try {
    $fecha=date("Y/m/d");
     $sql = "UPDATE dept_manager SET to_date='$fecha' WHERE emp_no='$jefeAntiguo' and dept_no='$department' and year(to_date)='9999'";
     $stmt = $baseDatos->prepare($sql);
     $stmt->execute();
   }//de try
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
   }//de catch
}//de BadFunctionCallException
//------------------------------------

function insertarNuevoJefe($baseDatos,$numEmpleado,$department){
  try{
    $stmt = $baseDatos->prepare("INSERT INTO dept_manager (emp_no,dept_no,from_date,to_date) VALUES (:numero,:dept,:fechaDesde,:fechaHasta)");
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':dept', $dept);
    $stmt->bindParam(':fechaDesde', $fechaDesde);
    $stmt->bindParam(':fechaHasta', $fechaHasta);

    $numero=$numEmpleado;
    $dept=$department;
    $fechaDesde=date("Y/m/d");
    $fechaHasta='9999/01/01';
    $stmt->execute();
  }//de try
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }//de catch
}//de fucntion
  ?>

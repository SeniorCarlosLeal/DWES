<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <?php
  $nombreDep=$_POST["nombre1"];

  //CONECTAMOS CON LA BASE DE DARTOS
  conexion($nombreDep);


  function conexion($nombredep){

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "empleados1n";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      altaDepartamento($conn,$nombredep);
    }

    catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }
  }//de function

  function altaDepartamento($conn,$nombredep){
    try{
      // prepare sql and bind parameters
      $stmt = $conn->prepare("INSERT INTO departamento (nombre_departamento) VALUES (:nombre)");
      $stmt->bindParam(':nombre', $nombre);


      // insert another row
      $nombre = $nombredep;
      $stmt->execute();

      echo "New records created successfully";
    }

    catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }//de catch

    $conn = null;
  } //de function

?>
</body>
</html>

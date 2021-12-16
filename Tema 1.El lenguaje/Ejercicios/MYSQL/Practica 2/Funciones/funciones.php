<?php

function conexion(){

  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "comprasweb";

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


  //----------------------------

  function  insertarCategoria($baseDatos,$categoria){
    $clave=generaClaveCat($baseDatos);

    try{
      $stmt = $baseDatos->prepare("INSERT INTO categoria (ID_CATEGORIA,NOMBRE) VALUES (:clave,:nombre)");
      $stmt->bindParam(':clave', $cod);
      $stmt->bindParam(':nombre', $nombre);

      $cod=$clave;
      $nombre=$categoria;

      $stmt->execute();

      echo "Categoria insertado correctamente";

    }//de try

    catch(PDOException $error)
    {
      errores($error);
    }
  }//de function

  //--------------------

  function generaClaveCat($baseDatos){

    $stmt = $baseDatos->prepare("SELECT ID_CATEGORIA FROM categoria");
    $stmt->execute();
    $salida=0;

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $row) {
      $salida++;
    }//de foreach

    return "C-".str_pad($salida+1,3,"0",STR_PAD_LEFT);

  }//de function

  //---------------------------------------------------------

  function desplegableCategoria($baseDatos){

    $stmt = $baseDatos->prepare("SELECT ID_CATEGORIA,NOMBRE FROM categoria");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt;

  }//de function

  //----------------------------------------------------

  function insertarProducto($baseDatos,$nombreProd,$precioProd,$categoria){
    $clave=generaClaveProd($baseDatos);
    try{
      $stmt = $baseDatos->prepare("INSERT INTO producto (ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA) VALUES (:idProd,:nombre,:precio,:idCategoria)");
      $stmt->bindParam(':idProd', $idProd);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':precio', $precio);
      $stmt->bindParam(':idCategoria', $catProd);

      $idProd=$clave;
      $nombre=$nombreProd;
      $precio=$precioProd;
      $catProd=$categoria;

      $stmt->execute();

      echo "Producto insertado correctamente";

    }//de try

    catch(PDOException $error)
    {
      echo($error);
    }
  }//de fucntion

  //---------------------------------------------------------------------

  function generaClaveProd($baseDatos){

    $stmt = $baseDatos->prepare("SELECT ID_PRODUCTO FROM producto");
    $stmt->execute();
    $salida=0;

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $row) {
      $salida++;
    }//de foreach

    return "P".str_pad($salida+1,4,"0",STR_PAD_LEFT);

  }//de function

  //---------------------------------------------------------------------------------

  function insertarAlmacen($baseDatos,$localidad){
    $clave=intval(generaClaveAlmacen($baseDatos));
    try{
      $stmt = $baseDatos->prepare("INSERT INTO almacen (NUM_ALMACEN,LOCALIDAD) VALUES (:numAlmacen,:localidadAl)");
      $stmt->bindParam(':numAlmacen', $numAlmacen);
      $stmt->bindParam(':localidadAl', $localidadAl);

      $numAlmacen=$clave;
      $localidadAl=$localidad;

      $stmt->execute();

      echo "Almacen insertado correctamente";

    }//de try

    catch(PDOException $error)
    {
      echo($error);
    }
  }//de fucntion

  //-----------------------------------------------------------------

  function generaClaveAlmacen($baseDatos){

    $stmt = $baseDatos->prepare("SELECT NUM_ALMACEN FROM almacen");
    $stmt->execute();
    $salida=0;

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $row) {
      $salida++;
    }//de foreach

    return ($salida+1)*10;

  }//de function


?>

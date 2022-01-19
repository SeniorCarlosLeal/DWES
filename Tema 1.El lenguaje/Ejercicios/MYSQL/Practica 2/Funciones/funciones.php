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

  $stmt = $baseDatos->prepare("SELECT max(ID_CATEGORIA) as cont FROM categoria");
  $stmt->execute();
  $salida=0;

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    $salida=$row["cont"];
  }//de foreach
  $salida=explode("C-",$salida);
  return "C-".str_pad(intval($salida[1])+1,3,"0",STR_PAD_LEFT);

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

  $stmt = $baseDatos->prepare("SELECT max(ID_PRODUCTO) as cont FROM producto");
  $stmt->execute();
  $salida=0;

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    $salida=$row["cont"];
  }//de foreach
  $salida=explode("P",$salida);

  return "P".str_pad($salida[1]+1,4,"0",STR_PAD_LEFT);

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

  $stmt = $baseDatos->prepare("SELECT max(NUM_ALMACEN) as num FROM almacen");
  $stmt->execute();
  $salida=0;

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    $salida=$row["num"];
  }//de foreach

  return ($salida)+10;

}//de function

//--------------------------------------------------------------------

function desplegableAlmacenes($baseDatos){

  $stmt = $baseDatos->prepare("SELECT NUM_ALMACEN,LOCALIDAD FROM almacen");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;

}//de function

//---------------------------------------------------------

function desplegableProductos($baseDatos){

  $stmt = $baseDatos->prepare("SELECT ID_PRODUCTO,NOMBRE FROM producto");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;

}//de function

//-----------------------------------------------

function  insertarAlmacenarProducto($baseDatos,$almacen,$producto,$cantidad){
  try{
    $stmt = $baseDatos->prepare("INSERT INTO almacena (NUM_ALMACEN,ID_PRODUCTO,CANTIDAD) VALUES (:numAlmacen,:numProd,:cantidadProd)");
    $stmt->bindParam(':numAlmacen', $numAlmacen);
    $stmt->bindParam(':numProd', $numProd);
    $stmt->bindParam(':cantidadProd', $cantidadProd);


    $numAlmacen=$almacen;
    $numProd=$producto;
    $cantidadProd=$cantidad;

    $stmt->execute();

    echo "Producto almacenado correctamente";

  }//de try

  catch(PDOException $error)
  {
    echo($error);
  }
}//de function

//---------------------------------------------------------------

function consultarStockProducto($baseDatos,$producto){
  try{
    $stmt = $baseDatos->prepare("SELECT almacen.LOCALIDAD as 'localidad',producto.NOMBRE as 'prod',almacena.Cantidad as 'cantidad'
      FROM almacen,producto,almacena
      WHERE almacen.NUM_ALMACEN=almacena.NUM_ALMACEN and
      producto.ID_PRODUCTO=almacena.ID_PRODUCTO and producto.ID_PRODUCTO='$producto'
      group by almacen.NUM_ALMACEN");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;
    }
    catch(PDOException $error)
    {
      echo($error);
    }
  }//de function

  //----------------------------------------------------------------------

  function consultarAlmacen($baseDatos,$almacen){
    try{
      $stmt = $baseDatos->prepare("SELECT almacen.LOCALIDAD as 'localidad',producto.NOMBRE as 'prod',almacena.Cantidad as 'cantidad'
        FROM almacen,producto,almacena
        WHERE almacen.NUM_ALMACEN=almacena.NUM_ALMACEN and
        producto.ID_PRODUCTO=almacena.ID_PRODUCTO and almacen.NUM_ALMACEN='$almacen'");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt;
      }
      catch(PDOException $error)
      {
        echo($error);
      }
    }//de function

    //---------------------------------------------------

    function insertarCliente($baseDatos, $nif,$nombre,$apellidos,$codPostal,$direccion,$ciudad){
      try{
        $stmt = $baseDatos->prepare("INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad,password) VALUES (:nif,:nombre,:apellido,:cp,:direccion,:ciudad,:contrasenia)");
        $stmt->bindParam(':nif', $nifCliente);
        $stmt->bindParam(':nombre', $nombreCliente);
        $stmt->bindParam(':apellido', $apellidoCliente);
        $stmt->bindParam(':cp', $cpCliente);
        $stmt->bindParam(':direccion', $dirCliente);
        $stmt->bindParam(':ciudad', $ciudadCliente);
        $stmt->bindParam(':contrasenia', $passwd);


        $nifCliente=$nif;$nombreCliente=$nombre;$apellidoCliente=$apellidos;$cpCliente=$codPostal;$dirCliente=$direccion;$ciudadCliente=$ciudad;$passwd=strtolower(strrev($apellidos));

        $stmt->execute();

        echo "Cliente insertado correctamente. Su contraseña es: " . strtolower(strrev($apellidos));

      }//de try

      catch(PDOException $error)
      {
        echo($error);
      }
    }//de function

    //-----------------------------------------------------

    function desplegableNif($baseDatos){

      $stmt = $baseDatos->prepare("SELECT NIF FROM cliente");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;

    }//de function

    //-----------------------------------------------------

    function consultarComprasCliente($baseDatos,$cliente,$fechaInicio,$fechaFin){
      try{
        $stmt = $baseDatos->prepare("SELECT producto.NOMBRE as 'Producto',compra.Unidades as 'Cantidad',compra.fecha_compra as 'Fecha'
          FROM cliente,producto,compra
          WHERE cliente.NIF=compra.NIF and producto.ID_PRODUCTO=compra.ID_PRODUCTO and cliente.NIF='$cliente' and compra.FECHA_COMPRA>='$fechaInicio' and
          compra.FECHA_COMPRA<'$fechaFin';");
          $stmt->execute();

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

          return $stmt;
        }
        catch(PDOException $error)
        {
          echo($error);
        }
      }//de function

      //-----------------------------------------------------------------

      function comprobarHayProducto($baseDatos,$producto){
        try{
          $stmt = $baseDatos->prepare("SELECT count(almacena.Cantidad) as 'almacenes'
          FROM almacen,producto,almacena
          WHERE almacen.NUM_ALMACEN=almacena.NUM_ALMACEN and
          producto.ID_PRODUCTO=almacena.ID_PRODUCTO and producto.ID_PRODUCTO='$producto';
          ");
          $stmt->execute();

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

          foreach ($stmt->fetchAll() as $row) {
            $salida=$row["almacenes"];
          }//de for eacg
          return $salida;
        }//de try
        catch(PDOException $error)
        {
          echo($error);
        }
      }//de function

      //-----------------------------------------------------------------

      function insertarCompra($baseDatos,$cliente,$fecha,$producto,$cantidadComprada){
        try{
          $stmt = $baseDatos->prepare("INSERT INTO compra (NIF,ID_PRODUCTO,FECHA_COMPRA,UNIDADES) VALUES (:nif,:id_producto,:fecha_compra,:unidades)");
          $stmt->bindParam(':nif', $nifCliente);
          $stmt->bindParam(':id_producto', $prodCliente);
          $stmt->bindParam(':fecha_compra', $fechaCliente);
          $stmt->bindParam(':unidades', $unidadesCliente);

          $nifCliente=$cliente;$prodCliente=$producto;$fechaCliente=$fecha;$unidadesCliente=$cantidadComprada;

          $stmt->execute();

          // buscarUnidadesAlmacen($baseDatos,$producto,$cantidadComprada);

          echo "Compra realizada";

        }//de try

        catch(PDOException $error)
        {
          echo($error);
        }
      }//de function

      //-----------------------------------------------------------------------

      //Preguntar como hacer para dismnuir la cantidad qeu se ha comprado en la tabla almacena

      function buscarUnidadesAlmacen($baseDatos,$producto,$cantidadComprada){
        try{
          $stmt = $baseDatos->prepare("SELECT almacen.localidad as 'localidad',producto.nombre as 'producto',almacena.Cantidad as 'cantidad'
          FROM almacen,producto,almacena
          WHERE almacen.NUM_ALMACEN=almacena.NUM_ALMACEN and
          producto.ID_PRODUCTO=almacena.ID_PRODUCTO and producto.ID_PRODUCTO='$producto'
          group by localidad
          having almacena.cantidad>0;
          ");
          $stmt->execute();

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

          foreach ($stmt->fetchAll() as $row) {
            $salida=$row["almacenes"];
          }//de for eacg
          return $salida;
        }//de try
        catch(PDOException $error)
        {
          echo($error);
        }
      }//de fucntion

      //-----------------------------------------------------------------------




      ?>

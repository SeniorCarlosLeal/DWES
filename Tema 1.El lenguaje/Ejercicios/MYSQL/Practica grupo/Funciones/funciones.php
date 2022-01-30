<?php

function conexion(){

  $servername = "localhost";
  $username = "id18363069_pedidosroot";
  $password = "LeonardoDaVinci123$";
  $dbname = "id18363069_pedidos";

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

//--------------------------------------

function desplegableProductos($baseDatos){

  $stmt = $baseDatos->prepare("SELECT productName,productCode FROM products");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;

}//de function


//--------------------------------------------------------------------------------

function desplegableNumCliente($baseDatos){

  $stmt = $baseDatos->prepare("SELECT customerNumber,customerName FROM customers");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;

}//de function

//----------------------------------------------------

function desplegablePedidos($baseDatos,$cliente){

  $stmt = $baseDatos->prepare("SELECT orderNumber,orderDate,status FROM orders where customerNumber='$cliente'");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;

}//de function

//------------------

function infoPedidos($baseDatos,$numPedido){

  $stmt = $baseDatos->prepare("SELECT orderLineNumber,productName,quantityOrdered,priceEach FROM orderdetails,products
    where orderdetails.productCode=products.productCode and orderNumber='$numPedido' order by orderLineNumber ");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt;

  }//de function

  function desplegableLineasProd($baseDatos){

    $stmt = $baseDatos->prepare("SELECT distinct productLine from products");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt;

  }//de fucntion

  //-----------------------------------

  function infoStockProd($baseDatos,$tipoProd){
    $stmt = $baseDatos->prepare("SELECT productName,quantityInStock from products where productLine='$tipoProd'
      order by quantityInStock DESC");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;
    }//de fucntion

    //------------------------

    function stockProducto($baseDatos,$producto){
      $stmt = $baseDatos->prepare("SELECT quantityInStock from products where productCode='$producto'");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;
    }//de stock producto

    //--------------------

    function pedidosEntreFechas($baseDatos,$fechaInicio,$fechaFin,$cliente){

      $stmt = $baseDatos->prepare("SELECT paymentDate,sum(amount) as 'Total' from payments where customerNumber= '$cliente'
      group by paymentDate
      having paymentDate>='$fechaInicio' and paymentDate<='$fechaFin'");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;

    }//de function

    //-------------

    function todoPedidos($baseDatos,$cliente){
      $stmt = $baseDatos->prepare("SELECT paymentDate,sum(amount) as 'Total' from payments where customerNumber= '$cliente'
      group by paymentDate");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;
    }//de function

    //-----------------------

    function productosTotales($baseDatos,$fechaInicio,$fechaFin){
      $stmt = $baseDatos->prepare("SELECT ORDERDETAILS.PRODUCTCODE, PRODUCTNAME, SUM(QUANTITYORDERED) as 'Cantidad' FROM ORDERDETAILS, ORDERS, PRODUCTS
      WHERE ORDERDETAILS.ORDERNUMBER=ORDERS.ORDERNUMBER AND ORDERDETAILS.PRODUCTCODE=PRODUCTS.PRODUCTCODE AND ORDERDATE>='$fechaInicio' AND ORDERDATE<='$fechaFin'
      GROUP BY ORDERDETAILS.PRODUCTCODE");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;
    }//de function

    //--------------------

    function desplegableArtStock($baseDatos){

      $stmt = $baseDatos->prepare("SELECT productName,productCode,quantityInStock from products where quantityInStock>='0' ");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;

    }//de function

    function  actualizarStock($baseDatos,$prodCodigo,$cantidadPedida){
      try {
        $cantidad=intval($cantidadPedida);

        $sql = "UPDATE products SET quantityInStock=quantityInStock-'$cantidad' WHERE productCode= '$prodCodigo'";

        $stmt = $baseDatos->prepare($sql);

        $stmt->execute();

        return 1;
      } catch(PDOException $e) {
        return 0;
        echo $sql . "<br>" . $e->getMessage();
      }
    }//de function

    //-----------

    function numeroMaxPedido($baseDatos){
      $stmt = $baseDatos->prepare("SELECT max(orderNumber) as 'Max' from orders");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      return $stmt;

    }//de function

    //---------------------------------------

    function insertarPedido($baseDatos,$num,$fecha,$cliente,$numPago,$carrito){
      $varNul=null;
      $enProgreso="In Progress";
      try{
        $stmt = $baseDatos->prepare("INSERT INTO orders(orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNUmber) VALUES (:numOrden,:fechaPedido,:fechaEntrega,:fechaVenta,:estado,:comentarios,:cliente)");
        $stmt->bindParam(':numOrden', $numero);
        $stmt->bindParam(':fechaPedido', $fechaR);
        $stmt->bindParam(':fechaEntrega', $fechaM);
        $stmt->bindParam(':fechaVenta', $venta);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':comentarios', $comentarios);
        $stmt->bindParam(':cliente', $clienteP);

        $numero=$num;
        $fechaR=$fecha;
        $fechaM=$fecha;
        $venta=$varNul;
        $estado=$enProgreso;
        $comentarios=$varNul;
        $clienteP=$cliente;

        $stmt->execute();

        insertarPago($baseDatos,$cliente,$numPago,$fecha,$carrito);
      }//de try

      catch(PDOException $error)
      {
        errores($error);
      }
    }//de function

    //--------------------------

    function insertarPago($baseDatos,$cliente,$numPago,$fecha,$carrito){
      $totalCarrito=cantidadDineroCarrito($baseDatos,$carrito);
      echo $totalCarrito;
      try{
        $stmt = $baseDatos->prepare("INSERT INTO payments(customerNumber,checkNumber,paymentDate,amount) VALUES (:cliente,:comprobar,:fechaPago,:total)");
        $stmt->bindParam(':cliente', $client);
        $stmt->bindParam(':comprobar', $comproba);
        $stmt->bindParam(':fechaPago', $fechaPag);
        $stmt->bindParam(':total', $tota);

        $client=$cliente;
        $comproba=$numPago;
        $fechaPag=$fecha;
        $tota=$totalCarrito;

        $stmt->execute();
      }
      catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
    }//de insertarPago

    //--------------------------

    function cantidadDineroCarrito($baseDatos,$carrito){
      $total=0;

      foreach ($carrito as $codProd => $cantidad) {
        $precio=precioCantidadComprada($baseDatos,$codProd,$cantidad);
        $total+=$precio;
      }//de for each
      return $total;
    }//de function
    //---------------------------

    function precioCantidadComprada($baseDatos,$codigoProducto,$cantidad){
      $stmt = $baseDatos->prepare("SELECT priceEach FROM orderDetails where productCode='$codigoProducto'");
      $stmt->execute();
      $salida=0;

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach($stmt->fetchAll() as $row) {
        $salida=$row['priceEach'];
      }//de foreach

      return $salida*$cantidad;
    }//de fucntion

    //--------------------------

    function comprobarFormatoTarjeta($numPago){
      $numPago=strtolower($numPago);
      if(preg_match("/^[a-z][a-z][0-9][0-9][0-9][0-9][0-9]$/", $numPago)==1){
        $salida=1;
      } // Devuelve 1
      else{
        $salida=0;
      }
      return $salida;

    }//de function



    ?>

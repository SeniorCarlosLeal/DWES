<?php
session_start();
?>

<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="../Css/estilos.css">
</head>
<body>
  <?php

    if(isset($_SESSION['login_cliente'])){
      echo "Has iniciado Sesion: ".$_SESSION['login_cliente']; ?>

      <center>
        <h2>Bienvenido al portal de compras web</h2>
        <div id="titulo">
          <h4>¿Que operación desea realizar?</h4>
        </div>
        <div id="cajaOpciones">

          <ul id="operaciones">
            <li><a href="./altaCategoria.php">Dar de alta una categoría de producto</a> </li>
            <li><a href="./altaProducto.php">Dar de alta una producto</a> </li>
            <li><a href="./altaAlmacen.php">Dar de alta un almacén</a> </li>
            <li><a href="./almacenaProducto.php">Almacenar un producto en un almacén</a> </li>
            <li><a href="./consultarStock.php">Consultar el stock de productos</a> </li>
            <li><a href="./consultarStockAlmacenes.php">Consultar el stock de cada almacén</a> </li>
            <li><a href="./altaCliente.php">Dar de alta a un cliente</a> </li>
            <li><a href="./compraProducto.php">Comprar un producto</a> </li>
            <li><a href="./comprasClientes.php">Consultar las compras de un cliente</a> </li>

            <!-- <br><li><a href="./Apartado2/altaEmpleado.php">Dar de alta un empleado</a></li>
            <br><li><a href="./Apartado3/cambioEmpleado.php">Cambiar de departamento a un empleado</a></li>
            <br><li><a href="./Apartado4/empleadosDepartamentos.php">Mostrar los empleados que trabajan en un departamento</a></li>
            <br><li><a href="./Apartado5/historicoEmpleadosDepartamento.php">Mostrar todos los empleados que han trabajado en un departamento</a></li>
            <br><li><a href="./Apartado5/historicoEmpleadosDepartamento.php">Mostrar todos los empleados que han trabajado en un departamento</a></li>
            <br><li><a href="./Apartado6/modificarSalario.php">Modificar el salario de un empleado</a></li>
            <br><li><a href="./Apartado7/empleadosEnFecha.php">Mostrar todos los empleados que han trabajado en fecha determinada</a></li>
            <br><li><a href="./Apartado8/informacionSalariosEmpleados.php">Mostrar los salarios de cada empleado por departamento</a></li> -->

          </ul>
        </div>
        <div class="cerrarSesion">
          <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>
        </div>
      </center>
    </body>

    <?php

    }else{
      echo "Acceso Restringido debes hacer Login con tu usuario";
      header("location: ./loginCliente.php");
  }

  ?>

</html>

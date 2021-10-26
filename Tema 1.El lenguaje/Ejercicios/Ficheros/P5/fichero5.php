<html>
<head><title>Datos Alumnos</title></head>


<body>

  <?php

  $nomFichero=$_POST["nombreFichero"];
  $operacionElegida=$_POST["operacion"];
  echo realpath("quijote.txt");
  require 'funcionesFichero5.php';

  if($operacionElegida=="mostrarFichero"){
    mostrarFichero($nomFichero);
  }//de if

  else if($operacionElegida=="mostrarLineaFichero"){
    $numLinea=$_POST["numeroLinea"];
    mostrarLineaFichero($nomFichero,$numLinea);
  }//de else if

  else if($operacionElegida=="mostrarNPrimerasLineas"){
    $primerasLineas=$_POST["primerasLineas"];
      mostrarNLineasFichero($nomFichero,$primerasLineas);
  }//de else if

  ?>

  </body>
  </html>

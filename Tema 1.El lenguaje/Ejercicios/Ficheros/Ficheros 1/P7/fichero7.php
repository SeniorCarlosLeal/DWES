<html>
<head><title>Datos Fichero</title></head>


<body>

  <?php
    $operacionFichero=$_POST["operacion"];
    $ficheroOrigen=$_POST["rutaOrigen"];
    $ficheroDestino=$_POST["rutaDestino"];
    require 'funcionesFichero7.php';

    if($operacionFichero=="copiar"){
      copiarFichero($ficheroOrigen,$ficheroDestino);
    }//de if

    else if($operacionFichero=="renombrar"){
      renombrarFichero($ficheroOrigen,$ficheroDestino);
    }//de else if

    else if($operacionFichero=="borrar"){
      borrarFichero($ficheroOrigen);
    }//de else if

  ?>

</body>
</html>

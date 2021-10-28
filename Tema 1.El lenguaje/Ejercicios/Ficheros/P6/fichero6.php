<html>
<head><title>Datos Fichero</title></head>


<body>

  <?php
    $fichero=$_POST["nomFichero"];

    if(file_exists($fichero)==true){
      echo "Nombre del fichero: " . basename($fichero) ."<br/>";
      echo "Dirección del fichero: ".dirname($fichero)."<br/>";
      echo "Tamaño del fichero: ".filesize($fichero)." bytes</br>";
      echo "Fecha de última modificacion del archivo: " . date ("F d Y H:i:s.", filemtime($fichero)) . "<br>";
    }
    else{
      echo "Error, la ruta del fichero es errónea";
    }

  ?>

</body>
</html>

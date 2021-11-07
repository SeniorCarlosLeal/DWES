<html>
<head><title>Datos Alumnos</title></head>


<body>

  <?php

  $nombre=$_POST["nombres"];
  $apellidos1=$_POST["apellido1"];
  $apellidos2=$_POST["apellido2"];
  $fecha=$_POST["date"];
  $localidadAlumno=$_POST["localidad"];

  $fila=$nombre ."$".$apellidos1 . "$" .$apellidos2 . "$" . $fecha . "$" . $localidadAlumno;
  $filaConContenido="\n".$nombre ."$".$apellidos1 . "$" .$apellidos2 . "$" . $fecha . "$" . $localidadAlumno;
  if(file_exists("fichero2.txt")==true){
    $fichero2=fopen("fichero2.txt", "a") or die("Ilegible");
    fwrite($fichero2,$filaConContenido);
  }
  else{
    $fichero2=fopen("fichero2.txt", "a") or die("Ilegible");
    fwrite($fichero2,$fila);
  }

  fclose($fichero2);

  $fichero2=fopen("fichero2.txt", "r") or die("Ilegible");
  $leer= fread($fichero2,filesize("fichero2.txt"));
  echo $leer;
  fclose($fichero2);
  ?>

</body>
</html>

<html>
<head><title>Datos Alumnos</title></head>


<body>

  <?php

  $nombre=$_POST["nombres"];
  $apellidos1=$_POST["apellido1"];
  $apellidos2=$_POST["apellido2"];
  $fecha=$_POST["date"];
  $localidadAlumno=$_POST["localidad"];

  $fila=str_pad($nombre,40," ",STR_PAD_LEFT) . " " . str_pad($apellidos1,40," ",STR_PAD_LEFT) . " " . str_pad($apellidos2,41," ",STR_PAD_LEFT) . " " . str_pad($fecha,9," ",STR_PAD_LEFT) .
  " " . str_pad($localidadAlumno,26," ",STR_PAD_LEFT);

  $filaEspacio="\n" . str_pad($nombre,40," ",STR_PAD_LEFT) . " " . str_pad($apellidos1,40," ",STR_PAD_LEFT) . " " . str_pad($apellidos2,41," ",STR_PAD_LEFT) . " " . str_pad($fecha,9," ",STR_PAD_LEFT) .
  " " . str_pad($localidadAlumno,26," ",STR_PAD_LEFT);


  if(file_exists("fichero1.txt")==true){
    $fichero1=fopen("fichero1.txt", "a") or die("Ilegible");
    fwrite($fichero1,$filaEspacio);
  }
  else{
    $fichero1=fopen("fichero1.txt", "a") or die("Ilegible");
    fwrite($fichero1,$fila);
  }

  fclose($fichero1);

  $fichero1=fopen("fichero1.txt", "r") or die("Ilegible");
  $leer= fread($fichero1,filesize("fichero1.txt"));
  echo $leer;
  fclose($fichero1);
  ?>

</body>
</html>

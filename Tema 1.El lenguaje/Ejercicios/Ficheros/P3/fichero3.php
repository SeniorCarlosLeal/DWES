<html>
<head><title>Datos Alumnos</title>
  <style>
    table,th,td{
      border:1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>


<body>
  <table style="width:100%">
    <tr>
      <td>Nombre</td>
      <td>Apellido 1</td>
      <td>Apellido 2</td>
      <td>Fecha</td>
      <td>Localidad</td>
    </tr>

    <?php

    $fichero3=fopen("../P1/fichero1.txt", "r") or die("Ilegible");


    while(!feof($fichero3)){
      $linea=fgets($fichero3);
      //echo $linea;
      sacarDatos($linea);
    }//de while

    fclose($fichero3);

    function sacarDatos($linea){
      //$lineaDiv=explode(" ",$linea);
    //  var_dump($lineaDiv);
      $nombre=substr($linea,0,40);
    //echo $nombre ."\n";
      $apellido1=substr($linea,41,40);
      //echo $apellido1;
      $apellido2=substr($linea,82,41);
      $fecha=substr($linea,123,11);
      $localidad=substr($linea,134,27);

      echo "<tr>
              <td>$nombre</td>
              <td>$apellido1</td>
              <td>$apellido2</td>
              <td>$fecha</td>
              <td>$localidad</td>
            </tr>";
    }//de function
    ?>
  </table>
</body>
</html>

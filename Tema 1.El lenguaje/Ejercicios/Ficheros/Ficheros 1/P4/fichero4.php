<html>
<head>
  <title>Datos Alumnos</title>
  <style>
    table,th,td{
      border:1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body>

  <table style="width:40%">
    <tr>
      <td>Nombre</td>
      <td>Apellido 1</td>
      <td>Apellido 2</td>
      <td>Fecha</td>
      <td>Localidad</td>
    </tr>

  <?php
  $fichero=fopen("../P2/fichero2.txt","r") or die("Ilegible");
  $cont=0;
  while(!feof($fichero)){
    $linea=fgets($fichero);
    sacarDatos($linea);
    $cont++;
  }//de while
  fclose($fichero);

  function sacarDatos($linea){
    $lineaDividida=explode("$",$linea);
    echo "<tr>";
    echo "<td>$lineaDividida[0]</td>";
    echo "<td>$lineaDividida[1]</td>";
    echo "<td>$lineaDividida[2]</td>";
    echo "<td>$lineaDividida[3]</td>";
    echo "<td>$lineaDividida[4]</td>";
    echo "</tr>";
  }

  echo "Se han dado ". $cont . " vueltas";
  ?>

</body>
</html>

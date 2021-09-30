<?php

echo "<html>
<head> <title> Ejercicio 15 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>
<center>
<h1>TABLA DE LOS ALUMNOS</h1>
  <table>
    <tr>
      <th>Nombre</th>
      <th>PHP</th>
      <th>DWEC</th>
      <th>DIW</th>
      <th>DAW</th>
    </tr>
    <tr>";

$alumnos=array("Carlos"=>array(9,10,4,8),"Pedro"=>array(7,8,5,2), "Ana"=>array(10,9,6,2), "Marta"=> array(3,5,9,5));
$notaMayor; $fila=0;$columna=1; $sumaNotas=0;

  foreach ($alumnos as $nombre => $notas) {
    echo "<tr><td>";echo  $nombre . "</br>";echo "</td>";
    $notaMayor=-1;
    $columna=1;
    $notaMenor=11;
    $sumaNotas=0;
    foreach ($notas as $valor) {
      echo "<td>";echo  $valor . "</br>";echo "</td>";

      if($valor>$notaMayor){
        $notaMayor=$valor;
        $asignaturaMayor=$columna;
      }//de if

      if($valor<$notaMenor){
        $notaMenor=$valor;
        $asignaturaMenor=$columna;
      }//de if
      $sumaNotas+=$valor;
      $columna++;
    }//de foreach2
    echo "El alumno " . $nombre . " la nota más alta que tiene es en la asignatura ". queAsignaturaEs($asignaturaMayor) . " con un " . $notaMayor . "<br>";
    echo "El alumno " . $nombre . " la nota más baja que tiene es en la asignatura ". queAsignaturaEs($asignaturaMenor) . " con un ". $notaMenor. "<br>";
    echo "El alumno " . $nombre . " tiene una media de  ". ($sumaNotas/($columna-1)). "<br>";
    echo "-------------------------------------------------------------------<br>";
    $fila++;
  }//de foreach1
  echo "</table>";

  $sumaMaterias=0;
  for($columna=0;$columna<4;$columna++){
    $sumaMaterias=0;

    foreach ($alumnos as $nombre => $nota) {
      $sumaMaterias+=$nota[$columna];//notas es un array que contine las notas de los alumnos por eso necesitamos acceder a una posicion, en este caso columnas para saber que nota hay en esa posicion
    }//de foreach
    echo " La media de la asignatura ". queAsignaturaEs($columna+1). " es de " .($sumaMaterias/4) . "<br>";
  }//de for

  function queAsignaturaEs($columna){
    if($columna==1){
      return "PHP";
    }//de if
    else if($columna==2){
      return "DWEC";
    }//de elseif
    else if($columna==3){
      return "DIW";
    }//de elseif
    else {
      return "DAW";
    }//de elseif

  }//de function
echo "</body>
</html>";
?>

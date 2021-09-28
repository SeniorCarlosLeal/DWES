<?php

echo "<html>
<head> <title> Ejercicio 8 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>";

$arrAlumnos=array("Carlos Leal Álvarez"=>8, "Daniel Ferrera Cubero"=>1, "Sergio Muñoz"=>7, "Sergio Bravo"=>5, "Juan Pablo Gónzalez"=>5);

$notaMayor=$arrAlumnos['Carlos Leal Álvarez']; $nombreMayor="";
$notaMenor=$arrAlumnos['Carlos Leal Álvarez']; $nombreMenor="";
$sumaNotas=0;

foreach ($arrAlumnos as $nombre => $nota) {
  if($nota<$notaMenor){
    $notaMenor=$nota;
    $nombreMenor=$nombre;
  }#de if

  if($nota>=$notaMayor){
    $notaMayor=$nota;
    $nombreMayor=$nombre;
  }#de if
  $sumaNotas+=$nota;
}#foreach

echo "La mayor nota es de " . $nombreMayor . " y su nota es " . $notaMayor . "</br>";
echo "La menor nota es de " . $nombreMenor . " y su nota es " . $notaMenor . "</br>";
echo "La media obtenida en la asignatura sería " . ($sumaNotas/count($arrAlumnos));

echo "</body>
</html>";
 ?>

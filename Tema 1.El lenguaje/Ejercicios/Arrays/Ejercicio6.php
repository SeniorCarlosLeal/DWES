<?php

echo "<html>
<head> <title> Ejercicio 5 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>
<center>";


$arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
$arr2 = array("Sistemas Informáticos","FOL","Mecanizado");
$arr3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

for($i=0;$i<count($arr2);$i++){
  if($arr2[$i]=="Mecanizado"){#en el caso de que el modulo sea mecanizado, lo borramos del array 2 y asi no lo añadimos al array1
    unset($arr2[$i]);
  }
  else{
    array_push($arr1, "$arr2[$i]");
  }
}#de for

for($i=0;$i<count($arr3);$i++){
  array_push($arr1, "$arr3[$i]");
}#de for

rsort($arr1);

echo "<p>"; print_r($arr1); echo "</p>";

echo "</body>
</center>
</html>";
?>

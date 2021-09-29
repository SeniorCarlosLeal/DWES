<?php

echo "<html>
<head> <title> Ejercicio 8 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>
<center>";

$matriz=array();
//PRIMERO RELLENAMOS LA MATRIZ CON NUMEROS ALEATORIOS
for($filas=0;$filas<3;$filas++){
  for($columnas=0;$columnas<5;$columnas++){
    $matriz[$filas][$columnas]=rand(1,20);
  }//de for2
}//de for1
echo "<h1>RELLENAMOS LA TABLA CON VALORES ALEATORIOS</h1>
<table style= width:20%>
<tr>";
//MOSTRAMOS LA MATRIZ
for($filas=0;$filas<count($matriz);$filas++){
  echo "<tr>";
  for($columnas=0;$columnas<5;$columnas++){
    if($columnas==5){
      echo "<td>";echo $matriz[$filas][$columnas] . "<br>";echo "</td>";
      echo "</tr>";
    }//de if
    echo "<td>";echo $matriz[$filas][$columnas] . "<br>";echo "</td>";
  }//de for2
}//de for1

echo "</tr></table></center>";
echo "<ul>";
for($filas=0;$filas<count($matriz);$filas++){
  for($columnas=0;$columnas<count($matriz,0);$columnas++){
    echo "<li>";echo " En la posicion " . $filas . "," . $columnas . "-->" . $matriz[$filas][$columnas] .
    "   || " . " En la posicion " . $columnas . "," . $filas . "-->" . $matriz[$columnas][$filas];echo "</li>";
  }//de for2
}//de for1
echo "</ul>";
echo "</body>
</html>";
?>

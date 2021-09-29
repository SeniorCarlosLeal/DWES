<?php

echo "<html>
<head> <title> Ejercicio 12 </title>
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

$mayorFila=$matriz[0][0];
$mayorColumna=$matriz[0][0];
$numFila;$numColumna;

for($filas=0;$filas<3;$filas++){
  for($columnas=0;$columnas<5;$columnas++){
    if($matriz[$filas][$columnas]>$mayorFila){
      $mayorFila=$matriz[$filas][$columnas];
      $numFila=$filas;
    }//de if

    if($matriz[$filas][$columnas]>$mayorColumna){
      $mayorColumna=$matriz[$filas][$columnas];
      $numColumna=$columnas;
    }//de if
  }//de for2
}//de for1

echo "La fila con el numero mayor es " . $numFila. "  "; print_r($matriz[$numFila]);echo "</br>";
echo "La columna con el mayor numero es ". $numColumna . "  ";print_r(array_column($matriz,$numColumna));

echo "</body>
</html>";
?>

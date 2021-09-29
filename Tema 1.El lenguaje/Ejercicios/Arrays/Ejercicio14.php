<?php

echo "<html>
<head> <title> Ejercicio 14 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>";

$matriz=array();
echo "<center>
<table>
<tr>";
for($filas=0;$filas<3;$filas++){
  echo "<tr>";
  for($columnas=0;$columnas<3;$columnas++){
    $matriz[$filas][$columnas]=rand(1,30);

    if($columnas==2){
      echo "<td>";echo $matriz[$filas][$columnas];echo "</td>";
      echo "</tr>";
    }//de if
    else{
      echo "<td>";echo $matriz[$filas][$columnas];echo "</td>";
    }//de else
  }//de for2
}//de for1
echo "</tr>
</table>
</center>";

$arrayDeMayoresValores=array(); $arrayMediasFilas=array();
$numMayor; $sumaFilas;
for($filas=0;$filas<3;$filas++){
  $numMayor=0;$sumaFilas=0;
  for($columnas=0;$columnas<3;$columnas++){
    if($matriz[$filas][$columnas]>$numMayor){
      $numMayor=$matriz[$filas][$columnas];
    }//de if
    $sumaFilas+=$matriz[$filas][$columnas];
  }//de ofr2
  array_push($arrayDeMayoresValores,$numMayor);
  array_push($arrayMediasFilas,($sumaFilas/3));
}//de for1

echo "Array de numeros mayores ";print_r($arrayDeMayoresValores);echo "<br>";
echo "Array de medias de filas ";print_r($arrayMediasFilas);

echo "</body>
</html>";
?>

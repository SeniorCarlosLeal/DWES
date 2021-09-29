<?php
echo "<html>
<head> <title> Ejercicio 8 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>
<center>
  <table>
  <tr>";
$dos=2;
$multiplo=1;
$matriz=array(array());
$continua=true;
for($fila=0;$fila<3 ;$fila++){
  echo "<tr>";
  for($columna=0;$columna<3 && $continua==true;$columna++){
   $matriz[$fila][$columna]=($dos * $multiplo);
    $multiplo++;

    if($columna==2){
      echo "<td>";echo  $matriz[$fila][$columna]; echo "</td>";
      echo "</tr>";
    }//de if

    else{
      echo "<td>";echo  $matriz[$fila][$columna]; echo "</td>";
    }

  }#de for
}#de for
echo "</tr>
</table></br>";

echo "<table>
      <tr>";
$sumaColumnas=0;;
for($columna=0;$columna<count($matriz, 0);$columna++){
  $sumaColumnas=0;
  for($fila=0;$fila<count($matriz);$fila++){
    $sumaColumnas+=$matriz[$fila][$columna];
  }//de for
  echo "<td>";echo " Columna " . $columna . " = ". $sumaColumnas ."<br>";echo "</td>";
}//de for1
echo "</tr>
      </table></br>";

  $sumaFilas=0;
  echo "<table style=width:10%>
        <tr>";
  for($fila=0;$fila<count($matriz);$fila++){
    $sumaFilas=0;
    for($columna=0;$columna<count($matriz,0);$columna++){
      $sumaFilas+=$matriz[$fila][$columna];
    }//de for 2
    echo "<td>";echo " Fila " . $fila . " = " . $sumaFilas.  "<br>";echo "</td></tr>";
  }//de for 1

  echo "</table>";
echo "</center></body>
</html>";
?>

<?php
echo "<html>
<head> <title> Ejercicio 9 </title>
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
</table>
</center>";
echo "</body>
</html>";
?>

<?php

echo "<html>
<head> <title> Ejercicio 13 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>";

$matriz=array();
echo "<center>
      <table style=width:20%>
      <tr>";
for($filas=0;$filas<5;$filas++){
  echo "<tr>";
  for($columnas=0;$columnas<3;$columnas++){
    $matriz[$filas][$columnas]=$filas+$columnas;

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
      </center>
      </body>
</html>";
 ?>

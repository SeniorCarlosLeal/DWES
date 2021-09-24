<?php
  echo "<html>";
  echo "<head>";
 echo " <style>
  table, th, td {
    border:4px solid black;
    border-collapse: collapse;
  }
  </style>";

  echo "</head>";
  echo "<body>";
  $num=2;
  $salida="";
  $numero=0;

  echo "<table style=width:100%>";
  echo "<tr>";
    echo "<th>Tabla del "; echo $num; echo "</th>";
    echo "<th> Resultado </th>";
  echo "</tr>";
 while ($numero<=10){
   echo "<tr>";
    echo "<th>"; echo $num . " * " . $numero; echo "</th>";
    echo "<th>";echo ($num*$numero); echo "</th>";
  echo "</tr>";
  $numero++;
 }# de while
  echo "</table>";
  echo "</body>";
  echo "</html>";
?>

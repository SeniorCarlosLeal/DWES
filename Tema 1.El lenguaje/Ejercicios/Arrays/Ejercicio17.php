<?php

echo "<html>
<head> <title> Ejercicio 8 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>";

$matrizOriginal=array(array(1,2,3,4),
                      array(5,6,7,8),
                      array(9,10,11,12));

$matrizTraspuesta=array();

for($i=0;$i<4;$i++){
  for($j=0;$j<3;$j++){
    $matrizTraspuesta[$i][$j]=$matrizOriginal[$j][$i];
  }//de for2
}//de for1

echo "<center>
          <h2>Matriz Original </h2>
          <table>
            <tr>";

    for($i=0;$i<3;$i++){
      echo "<tr>";
      for ($j=0; $j<4 ; $j++) {
        if($j==3){
          echo "<td>";echo $matrizOriginal[$i][$j]; echo "</td>";
          echo "</tr>";
        }//de if
        else{
            echo "<td>";echo $matrizOriginal[$i][$j]; echo "</td>";
        }//de else
      }//de for
    }//de for
    echo "</tr></table></center><br>";

    echo "<center>
              <h2>Matriz Traspuesta </h2>
              <table>
                <tr>";

        for($i=0;$i<4;$i++){
          echo "<tr>";
          for ($j=0; $j<3 ; $j++) {
            if($j==3){
              echo "<td>";echo $matrizTraspuesta[$i][$j]; echo "</td>";
              echo "</tr>";
            }//de if
            else{
                echo "<td>";echo $matrizTraspuesta[$i][$j]; echo "</td>";
            }//de else
          }//de for
        }//de for
        echo "</tr></table></center><br>";

echo "</body>
</html>";
 ?>

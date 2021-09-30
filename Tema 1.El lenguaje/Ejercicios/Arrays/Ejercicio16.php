<?php

echo "<html>
<head> <title> Ejercicio 16 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>";

$arrA=array(array(1,2,3),
            array(4,5,6),
            array(7,8,9));

$arrB=array(array(9,8,7),
      array(6,5,4),
      array(3,2,1));

  echo "<center>
            <h2>Matriz A </h2>
            <table>
              <tr>";

      for($i=0;$i<3;$i++){
        echo "<tr>";
        for ($j=0; $j<3 ; $j++) {
          if($j==2){
            echo "<td>";echo $arrA[$i][$j]; echo "</td>";
            echo "</tr>";
          }//de if
          else{
              echo "<td>";echo $arrA[$i][$j]; echo "</td>";
          }//de else
        }//de for
      }//de for
      echo "</tr></table></center><br>";

      echo "<center>
                <h2>Matriz B </h2>
                <table>
                  <tr>";

          for($i=0;$i<3;$i++){
            echo "<tr>";
            for ($j=0; $j<3 ; $j++) {
              if($j==2){
                echo "<td>";echo $arrB[$i][$j]; echo "</td>";
                echo "</tr>";
              }//de if
              else{
                  echo "<td>";echo $arrB[$i][$j]; echo "</td>";
              }//de else
            }//de for
          }//de for
          echo "</tr></table></center>";

$multiplicacion=array(); $suma=array();

for($i=0;$i<3;$i++){
  for($j=0;$j<3;$j++){
    $multiplicacion[$i][$j]=multiplcar($i,$j,$arrA,$arrB);
    $suma[$i][$j]=($arrA[$i][$j] + $arrB[$i][$j]);
  }//de for2
}//de for1

echo "<center>
      <h2>Producto</h2>
      <table>
        <tr>";

for($i=0;$i<3;$i++){
  echo "<tr>";
  for ($j=0; $j<3 ; $j++) {
    if($j==2){
      echo "<td>";echo $multiplicacion[$i][$j]; echo "</td>";
      echo "</tr>";
    }//de if
    else{
        echo "<td>";echo $multiplicacion[$i][$j]; echo "</td>";
    }//de else
  }//de for
}//de for
echo "</tr></table></center><br>";

echo "<center>
          <h2>Suma </h2>
          <table>
            <tr>";

    for($i=0;$i<3;$i++){
      echo "<tr>";
      for ($j=0; $j<3 ; $j++) {
        if($j==2){
          echo "<td>";echo $suma[$i][$j]; echo "</td>";
          echo "</tr>";
        }//de if
        else{
            echo "<td>";echo $suma[$i][$j]; echo "</td>";
        }//de else
      }//de for
    }//de for
    echo "</tr></table></center><br>";

function multiplcar($fila,$columna,$arrA,$arrB){
  $matrizA=$arrA[$fila];
  $matrizB=array_column($arrB,$columna);
  $suma=0;
  for($i=0;$i<3;$i++){
    $suma=$suma + ($matrizA[$i]*$matrizB[$i]);
  }//de for
  return $suma;
}//de function


echo "</body>
</html>";
?>

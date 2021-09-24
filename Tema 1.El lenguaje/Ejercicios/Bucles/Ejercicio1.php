<html>
<head><title>Ej1</title></head>
<body>
<?php
  $num=4;
  $resto;
  $cociente=$num;
  $salida="";
  while($cociente>=1){
    $resto=$cociente%2;
    $salida=$resto . "" . $salida;
    $cociente=$cociente/2;
  }#de while

  echo "El numero " . $num . " en binario es = " . $salida . "<br/>";

?>
</body>
</html>

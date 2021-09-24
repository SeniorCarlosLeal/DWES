<html>
<head><title>Ej2</title></head>
<body>
<?php
  $num=48;
  $base=2;
  $cociente=$num;
  $salida="";
  while($cociente>=1){
    $resto=$cociente%$base;
    $salida=$resto . "" . $salida;
    $cociente=$cociente/$base;
  }#de while

  echo "El numero " . $num . " en base " . $base . " es = " . $salida . "<br/>";

?>
</body>
</html>

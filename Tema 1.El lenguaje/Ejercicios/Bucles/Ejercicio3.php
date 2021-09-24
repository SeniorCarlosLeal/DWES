<html>
<head><title>Ej3</title></head>
<body>
<?php
  $num=15;
  $resto;
  $cociente=$num;
  $salida="";
  while($cociente>=1){
    $resto=$cociente%16;

    if($resto>=10){
      $resto=restoDecimal($resto);
    }

    $salida=$resto . "" . $salida;
    $cociente=$cociente/16;
  }#de while

  function restoDecimal($numero){
    if($numero==10){
      return "A";
    }
    else if ($numero==11){
      return "B";
    }#de else if
    else if ($numero==12){
      return "C";
    }#de else if
    else if ($numero==13){
      return "D";
    }#de else if
    else if ($numero==14){
      return "E";
    }#de else if
    else{
      return "F";
    }#de else;
  }#de function
  
  echo "El numero " . $num . " en HEXADECIMAL es = " . $salida . "<br/>";

?>
</body>
</html>

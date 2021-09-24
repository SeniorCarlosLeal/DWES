<html>
<head></head>
<body>
<?PHP
  #Comentario de una sola linea
  /*Comentario de varias lineas
  Comentario de varias lineas
  Comentario de varias lineas
  Comentario de varias lineas*/

  echo "Primer echo <br/>";
  echo "Primer echo " . " concatenado" . "<br/>";

  $x=1;
  $y=3;
  $z= $x + $y;
  echo "Echo que imprime una variable = \$z-->" . $z . "<br/>";

  $num=12;
  $text=sprintf("El numero $num en binarios es %b <br/>", $num);
  echo $text;

  ?>
</body>
</html>

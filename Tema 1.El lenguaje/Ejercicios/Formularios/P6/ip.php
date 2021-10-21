<?php

echo"<html lang=es dir=ltr>
  <head>
    <meta charset=utf-8>
    <title>IP</title>
  </head>
  <body>";
  include 'funcionesIp.php';
  $ip=explode(".",$_POST["ip"]);

  $tamanio=count($ip);
  $continua=true;
  $salida="";
  for($i=0;$i<$tamanio && $continua==true;$i++){

    if(comprobar($ip[$i])==true){
      $salida=$salida . str_pad(aBinario($ip[$i]),8,"0",STR_PAD_LEFT) . ".";
    }//de if
    else{
      $continua=false;
    }//de else
  }//de for

  if($continua==false){
    echo "Error";
  }//de if
  else{
    echo $salida;
  }

  echo "</body>
</html>";

?>

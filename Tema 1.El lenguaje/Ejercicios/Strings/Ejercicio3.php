<html>
<head></head>
<body>
  <?php
    $ip="192.160.26.109/20";
    echo "La direccion IP es = " . $ip . "<br/>";
    $mascara=explode('/',$ip);
    echo "Mascara = " . $mascara[1] . "<br/>";

    $bitsHost=32-$mascara[1];
    $ipSinMascara=explode('.',$mascara[0]);
    $ipBinario=str_pad(decbin($ipSinMascara[0]),8,"0",STR_PAD_LEFT) . "." . str_pad(decbin($ipSinMascara[1]),8,"0",STR_PAD_LEFT) . "." .
              str_pad(decbin($ipSinMascara[2]),8,"0",STR_PAD_LEFT) . "." . str_pad(decbin($ipSinMascara[3]),8,"0",STR_PAD_LEFT);
    echo "Direccion en Binario = ".$ipBinario . "<br/>";
    $dirRed=$ipBinario;
    $cont=0;

    for($i=strlen($dirRed)-1;$i>=0 and $cont<$bitsHost;$i--){
      if($dirRed[$i]!="."){
        $dirRed[$i]=0;
        $cont++;
      }#if
    }#de for
    echo "Direccion de Red = " . $dirRed . "<br/>";


    $dirBroadcast=$ipBinario;
    $cont1=0;

    for($j=strlen($dirBroadcast)-1;$j>=0 and $cont1<$bitsHost;$j--){
      if($dirBroadcast[$j]!="."){
        $dirBroadcast[$j]=1;
        $cont1++;
      }#if
    }#de for
    echo "Direccion de Broadcast = " . $dirBroadcast . "<br/>";

    $primerHost=$dirRed;
    $primerHost[strlen($dirRed)-1]=1;
    echo "Direccion del Primer Host en binario = " . $primerHost . "<br/>";

    $ultimoHost=$dirBroadcast;
    $ultimoHost[strlen($dirBroadcast)-1]=0;
    echo "Direccion del ultimo Host en binario = " .$ultimoHost . "<br/>";

    echo "-----------------------------------------" . "<br/>";
    $ipRed=explode("." , $dirRed);
    echo "Direccion de Red = " . bindec($ipRed[0]). "." . bindec($ipRed[1]). "." . bindec($ipRed[2]). "." . bindec($ipRed[3]) . "<br/>";

    $ipBroadcast=explode(".",$dirBroadcast);
    echo "Direccion de Broadcast = " . bindec($ipBroadcast[0]). ".". bindec($ipBroadcast[1]). ".". bindec($ipBroadcast[2]). ".". bindec($ipBroadcast[3]). "<br/>";

    $ipPrimerHost= explode(".",$primerHost);
    echo "Primer Host = " . bindec($ipPrimerHost[0]). "." .bindec($ipPrimerHost[1]). "."  .bindec($ipPrimerHost[2]). "." .bindec($ipPrimerHost[3]) . "<br/>";

    $ipUltimoHost= explode("." , $ultimoHost);
    echo "Ultimo Host = " . bindec($ipUltimoHost[0]). "." . bindec($ipUltimoHost[1]). "." . bindec($ipUltimoHost[2]). "." . bindec($ipUltimoHost[3]);
  ?>
</body>
</html>

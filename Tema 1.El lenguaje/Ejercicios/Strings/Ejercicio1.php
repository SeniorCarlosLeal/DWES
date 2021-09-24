<html>
<head><title>Ejercicio1</title></head>
<body><?php

$ip="192.18.16.204";

$ip2=explode('.',$ip);
$text=sprintf("La direccion ip en binario es %b . %b . %b . %b ",intval($ip2[0]),intval($ip2[1]),intval($ip2[2]),intval($ip2[3]));
echo $text;
?>
</body>
</html>

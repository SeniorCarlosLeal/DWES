<?php

echo "<html lang=es dir=ltr>
<head>
<meta charset=utf-8>
<title>Cambio de base</title>
</head>
<body>

<h1>Cambio de base</h1>";

$numeroViejo=explode("/",$_POST["numOrigen"]);
$baseNueva=$_POST["nuevaBase"];

$numeroAntiguo=$numeroViejo[0];
$baseVieja=$numeroViejo[1];

echo "El número ". $numeroAntiguo . " en base ". $baseVieja . " es " . base_convert($numeroAntiguo,$baseVieja,$baseNueva) . " en base " . $baseNueva;

echo "  </body>
</html>";

?>

<?php

echo "<html>";
echo "<head>
<title>Binario</title>
</head>";

echo "<body>";
echo "<h1>Binario</h1>";
$numDecimal=$_POST["numDecimal"];

$numBinario=convertirABinario($numDecimal);

echo "Numero Decimal: <input type='text' name='numDecimal' value=$numDecimal  readonly> <br><br><br><br>";
echo "Numero Decimal: <input type='text' name='numDecimal' value=$numBinario  readonly> <br><br><br><br>";

echo "</body>";
echo "</html>";

function convertirABinario($numero){
  return decbin($numero);
}
?>

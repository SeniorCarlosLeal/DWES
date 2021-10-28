<?php

echo "<html>";
echo "<head>
<title>Binario</title>
<style>
table, th, td {
  border:1px solid black;
}
</style>
</head>";

echo "<body>";
echo "<h1>CONVERSOR NUMERICO</h1>";
include 'funcionesConersor.php';
$opcion=$_POST["operacion"];
$numero=$_POST["numDecimal"];

if($opcion=="Binario"){
  $numBinario=convBinario($numero);
  echo "Numero Binario: <input type='text' name='numDecimal' value=$numBinario  readonly> <br><br><br><br>";
}//de if

else if ($opcion=="Octal"){
  $numOctal=convOctal($numero);
  echo "Numero Binario: <input type='text' name='numDecimal' value=$numOctal readonly> <br><br><br><br>";
}//de else if

else if ($opcion=="Hexadecimal"){
  $numHexadecimal=convHexadecimal($numero);
  echo "Numero Binario: <input type='text' name='numDecimal' value=$numHexadecimal readonly> <br><br><br><br>";
}//de else if

else if ($opcion=="Todos"){
  $numBinario=convBinario($numero);
  $numOctal=convOctal($numero);
  $numHexadecimal=convHexadecimal($numero);

  echo "<table style=width:20% >
          <tr>
            <td>Decimal</td>
            <td>$numero</td>
          </tr>
          <tr>
            <td>Binario</td>
            <td>$numBinario</td>
          </tr>
          <tr>
            <td>Octal </td>
            <td>$numOctal</td>
          </tr>
          <tr>
            <td>Hexadecimal</td>>
            <td>$numHexadecimal</td>
          </tr>
        </table>";
}//de else if

echo "</body>";
echo "</html>";

 ?>

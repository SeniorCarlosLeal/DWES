<?php

echo "<html>";
echo "<head>
<titlte>Calculadora</title>
</head>";

echo "<body>";
echo "<h1>CALCULADORA</h1>";

include 'funcionesCalculadora.php';

$operacion = $_POST["operacion"];
$operando1=$_POST["Operando1"];
$operando2=$_POST["Operando2"];

if($operacion=="suma"){
  $resultado=suma($operando1,$operando2);
  echo "La operacion " . $operando1 . " + " . $operando2 . " = " . $resultado;
}//de if

else if($operacion=="resta"){
  $resultado=resta($operando1,$operando2);
  echo "La operacion " . $operando1 . " - " . $operando2 . " = " . $resultado;
}//de if

else if($operacion=="multiplicacion"){
  $resultado=multiplicacion($operando1,$operando2);
  echo "La operacion " . $operando1 . " * " . $operando2 . " = " . $resultado;
}//de if

else if($operacion=="division"){
  $resultado=division($operando1,$operando2);
  echo "La operacion " . $operando1 . " / " . $operando2 . " = " . $resultado;
}//de if


echo "</body>";
echo "</html>";

?>

<?php

echo "<html>";
echo "<head>
<titlte>Calculadora</title>
</head>";

echo "<body>";
echo "<h1>CALCULADORA</h1>

<form name=formulario method=post action=";htmlspecialchars($_SERVER["PHP_SELF"]);echo ">

<p>Operando 1: <input type='text' name='Operando1' required></p>
<p>Operando 2: <input type='text' name='Operando2' required></p>

Selecciona una operación: <br>
<input type='radio' name='operacion' value='suma' /> Suma <br>
<input type='radio' name='operacion' value='resta' /> Resta <br>
<input type='radio' name='operacion' value='multiplicacion' /> Multiplicacion <br>
<input type='radio' name='operacion' value='division' /> Division<br>


<input type='submit' value='Enviar' />
<input type='reset' value='Borrar ' />
</form>";

include 'funcionesCalculadora.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
}

echo "</body>";
echo "</html>";

?>

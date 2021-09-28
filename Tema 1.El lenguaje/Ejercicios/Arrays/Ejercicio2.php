<?php
echo "<html>
<head> <title> Ejercicio 1 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>

<body>
<center>
<table>
  <tr>
    <th>Indice</th>
      <th> Valor </th>
      <th>Suma</th>
    </tr>";

    $cont=0;
    $sumaPares=0; $contPares=0;
    $sumaImpares=0; $contImpares=0;
    $sumaTotal=0;
    for($i=1;$i<20;$i=$i+2){
      ${"numero" . $cont}=$i;

      echo "<tr>";
        echo "<td>"; echo $cont; echo "</td>";
        echo "<td>"; echo ${"numero" . $cont}; echo "</td>";

      if($cont%2==0){
        $sumaPares=$sumaPares+$i;
        $contPares++;
      }#de if
      else{
        $sumaImpares=$sumaImpares+$i;
        $contImpares++;
      }#de else
      $sumaTotal=$sumaTotal+$i;
      echo "<td>"; echo $sumaTotal; echo "</td>";
    echo "</tr>";
      $cont++;
    }#de for

    echo"<tr>";
      echo "<td colspan=3> Media de los numeros en posiciones pares = ";echo ($sumaPares/$contPares); echo "</td>";
    echo "</tr>
        <tr>
          <td colspan=3> Media de los numeros en posiciones impares = ";echo ($sumaImpares/$contImpares);echo "</td>
          </tr>";
echo "</table>
</center>";
echo "</body>";
echo "</html>";
?>

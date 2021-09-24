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
          $i=1;
          $suma=0;
          while($cont<20){
            ${"numero" . $cont}=$i; #creamos la variable numero y el numero de variable que sea desde $numero0 hasta $numero19
            $i+=2;
            $cont++;
          }#de while
            for($j=0;$j<20;$j++){
              $impares[$j]=${"numero". $j}; # guardamos en la posicion j el valor que haya en la variable numero y la posicion de j
              $suma+=${"numero". $j};
              echo "<tr>
                      <td>"; echo $j ; echo "</td>
                      <td>"; echo $impares[$j]; echo "</td>
                      <td>"; echo $suma; echo "</td>";
              echo "</tr>";
            }#de for
            echo"<table>
            </center>";
    echo "</body>";
  echo "</html>";
 ?>

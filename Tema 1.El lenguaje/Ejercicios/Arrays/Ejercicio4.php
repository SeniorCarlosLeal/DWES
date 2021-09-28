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
              <th> Binario </th>
              <th>Octal</th>
              </tr>";

              $decimales=array();
              for($i=0;$i<21;$i++){
                $decimales[$i]=array_push($decimales, $i);
              }//de for

             rsort($decimales);
              print_r($decimales);
              $tope = count($decimales);
              for($i=0;$i<$tope;$i++){
                echo "<tr>";
                  echo "<td>";echo $decimales[$i];echo "</td>";
                  echo "<td>";echo decbin($decimales[$i]);echo "</td>";
                  echo "<td>";echo decoct($decimales[$i]);echo "</td>";
                echo "</tr>";
              }#decimales
            echo"<table>
            </center>";
    echo "</body>";
  echo "</html>";
 ?>

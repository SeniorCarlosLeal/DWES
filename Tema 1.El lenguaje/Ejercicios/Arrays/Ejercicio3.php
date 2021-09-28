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

              for($i=0;$i<21;$i++){
                echo "<tr>";
                  echo "<td>";echo $i;echo "</td>";
                  echo "<td>";echo decbin($i);echo "</td>";
                  echo "<td>";echo decoct($i);echo "</td>";
                echo "</tr>";
              }//de for
            echo"<table>
            </center>";
    echo "</body>";
  echo "</html>";
 ?>

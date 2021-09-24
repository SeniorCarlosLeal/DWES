<?php
  echo "<html>";
    echo "<head>
    <title> Ejercicio 6</title>
    <link href=Css/estilos.css rel=stylesheet type=text/css />
    </head>
    <body>";

    $numero=5;
    $salida=1;
    $proceso="";

    echo "<center>
    <h1> FACTORIAL DE "; echo $numero; echo" </h1>";

    while($numero>=1){
      $salida=$salida*$numero;
      $proceso = $proceso . $numero . "*";
      $numero--;
    }#de while

    echo "<div id=proceso>";
      echo "<p>"; echo $proceso; echo "</p>";
    echo "</div>";

    echo "<h3>RESULTADO</h3>";
    
    echo "<div id=resultado>";
    echo "<p>"; echo $salida; echo "</p>";
    echo "</div>";
    echo "</center>";
    echo "</body>";
  echo "</html>";
 ?>

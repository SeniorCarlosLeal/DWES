<html>
<head>
  <title>Dados</title>
  <link href=Css/estilos.css rel=stylesheet type=text/css />
</head>

<body>
  <center>
  <h1>Resultado juego de dados</h1>
  
  <?php
  $mydate=getdate(date("U"));
  echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year], $mydate[hours]:$mydate[minutes]:$mydate[seconds]" . "</br></br>";
  ?>

  <table style="width:50%">
    <?php
    require 'funcionesDados.php';

    //recogemos los nombres de los jugadores
    $nomJugador1=$_POST["nombre1"];
    $nomJugador2=$_POST["nombre2"];
    $nomJugador3=$_POST["nombre3"];
    $nomJugador4=$_POST["nombre4"];

    $numDados=$_POST["numdados"];//recogemos el numero de dados con el que jugamos

    if( $numDados<1 || $numDados>10 ){
      echo "<h1> SOLO SE PUEDE JUGAR COMO MÍNIMO CON 1 DADO Y CON UN MÁXIMO DE 10</h1>";
    }//de if

    else if ( empty($nomJugador1) || empty($nomJugador2) || empty($nomJugador3) || empty($nomJugador4) ){
      echo "<h1> TIENE QUE HABER 4 JUGADORES </h1>";
    }//de else if

    else{

    echo "<tr>
    <td>" . $nomJugador1 . "</td>";//ponemos el nombre del jugador
    $dadosJ1=generarDadosJugador($numDados);//llamamos a la funcion que nos va a generar los dados y ponerlos en la tabla
    echo "<tr>
    <td>" . $nomJugador2 . "</td>";//ponemos el nombre del jugador
    $dadosJ2=generarDadosJugador($numDados);//llamamos a la funcion que nos va a generar los dados y ponerlos en la tabla
    echo "<tr>
    <td>" . $nomJugador3 . "</td>";//ponemos el nombre del jugador
    $dadosJ3=generarDadosJugador($numDados);//llamamos a la funcion que nos va a generar los dados y ponerlos en la tabla
    echo "<tr>
    <td>" . $nomJugador4 . "</td>";//ponemos el nombre del jugador
    $dadosJ4=generarDadosJugador($numDados);//llamamos a la funcion que nos va a generar los dados y ponerlos en la tabla
    echo "</table>";

    //guardamos las puntuaciones de cada jugador en una variable, ya que las necesitaremos más adelante
    $puntuacionJ1=puntuacionJugador($dadosJ1);
    $puntuacionJ2=puntuacionJugador($dadosJ2);
    $puntuacionJ3=puntuacionJugador($dadosJ3);
    $puntuacionJ4=puntuacionJugador($dadosJ4);

    //imprimimos las puntuaciones de cada jugador;

    echo "<div id=puntuaciones>

      <h2>PUNTUACIONES</h2>";

    echo $nomJugador1 . " = " . $puntuacionJ1."</br>";
    echo $nomJugador2 . " = " . $puntuacionJ2."</br>";
    echo $nomJugador3 . " = " . $puntuacionJ3."</br>";
    echo $nomJugador4 . " = " . $puntuacionJ4."</br>";

    echo "</div>
          <div id=ganador>
          <h2>GANADOR/ES</h2>";

    ganadorDados($puntuacionJ1,$puntuacionJ2,$puntuacionJ3,$puntuacionJ4,$nomJugador1,$nomJugador2,$nomJugador3,$nomJugador4);

    echo "</div>";
  }
    ?>
  </center>
    </body>
    </html>

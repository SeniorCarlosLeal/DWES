<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos.css" />
</head>
<body>
	<center>
	<h1>Partida BlackJack</h1>

	<?php
	require 'funciones.php';

	$jugador1=$_POST["nombre1"];
	$jugador2=$_POST["nombre2"];
	$jugador3=$_POST["nombre3"];
	$jugador4=$_POST["nombre4"];
	$numCartas=$_POST["numcartas"];
	$apuesta=$_POST["apuesta"];

	$cartasJ1=generarJugada($numCartas);
	$cartasJ2=generarJugada($numCartas);
	$cartasJ3=generarJugada($numCartas);
	$cartasJ4=generarJugada($numCartas);
	$cartasBanca=generarJugada($numCartas);

	$partida=array( $jugador1=>$cartasJ1,$jugador2=>$cartasJ2,$jugador3=>$cartasJ3,$jugador4=>$cartasJ4,"Banca"=>$cartasBanca);

	mostrarJugada($partida);

	$puntuaciones=puntuaciones($partida);

	buscarGanadores($puntuaciones,$apuesta);
	?>
</center>
</body>
</html>

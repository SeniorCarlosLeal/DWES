<?php 

echo "<html>
	<head></head>
	<body>";

$datosInditex=array("Precio"=>"31,8", "Variación"=>"-0.13", "Var"=>"-0.04", "Titulos"=>"475.495", "Volumen euros"=>"15.027.985,74");

foreach($datosInditex as $valores =>$datos){
	echo $datosInditex . " " . $datos;
}///de foreach

echo "</body></html>";	
	
?>

<?php

function generarJugada($numeroCartas){
  $baraja=array("AC","2C","3C","4C","5C","6C","7C","JC","QC","KC",
  "AD","2D","3D","4D","5D","6D","7D","JD","QD","KD",
  "AP","2P","3P","4P","5P","6P","7P","JP","QP","KP",
  "AT","2T","3T","4T","5T","6T","7T","JT","QT","KT");

  $cont=0;
  $jugada=array();

  while($cont<$numeroCartas){
    $num=rand(0,39);

    array_push($jugada,$baraja[$num]);
    $cont++;
  }//de while
  return $jugada;
}//de ufnction
//------------------------------------------------------------------

function mostrarJugada($partida){
  echo "<table>";

  foreach ($partida as $jugador => $mano) {
    echo "<tr>";
    echo "<td>" . $jugador ."</td>";
    foreach ($mano as $carta => $valor) {
      echo  " <td><img src=images/$valor.png alt=Flowers in Chania>" . "</td>";
    }
    echo "</tr>";
  }//de foreach

  echo "</table>";
}//de function

//-----------------------------------------------------------------------------

function puntuaciones($partida){
  $puntuaciones=array();
  foreach ($partida as $jugador => $mano) {
    $puntos=0;
    foreach ($mano as $carta => $valor) {
      $puntosCarta=comprobarPuntuacion(substr($valor,0,1));
      $puntos=$puntos+$puntosCarta;
    }//de for each 2
    $puntuaciones[$jugador]=$puntos;
  }//de foreach 1
  return $puntuaciones;
}//de function

//----------------------------------------------------------------------------

function comprobarPuntuacion($carta){
  if($carta=="A"){
    return 1;
  }//de if
  elseif ($carta=="J" || $carta=="Q" || $carta=="K") {
    return 10;
  }//de elseif

  else{
    return intval($carta);
  }//de else
}//de function

//-------------------------------------------------------------------------

function buscarGanadores($puntuaciones,$apuesta){
  foreach ($puntuaciones as $jugador => $puntos) {
    if($jugador=="Banca"){
      if($puntos==21){
        $ganadores=buscarGanadoresBanca21($puntuaciones);
        $ganadores[$jugador]=$puntos;
        imprimirGanadores($ganadores,$apuesta);
      }//de if

      elseif($puntos>21){
        $ganadores=buscarGanadoresBancaMayor21($puntuaciones);
        imprimirGanadores($ganadores,$apuesta);
      }//fde if

      elseif($puntos<21){
        $ganadores=buscarGanadoresBancaMenor21($puntuaciones,$puntos);
        $tamanio=count($ganadores);

        if($tamanio==0){
          $ganadores["Banca"]=$puntos;
        }//de if

        imprimirGanadores($ganadores,$apuesta);
      }//de else if
    }//de if
  }//de for each
}//de function

//------------------------------------------------------------------------

function imprimirGanadores($ganadores,$apuesta){
  $tamanio=count($ganadores);
  $salida="";
  foreach ($ganadores as $jugador => $puntos) {
    $salida=$salida. $jugador ."#".$puntos."#".($apuesta/$tamanio)."<br>";
  }//de for each
  echo $salida;
  escribirEnFichero($salida);
}//de fucntion

//------------------------------------------------------------------------

function escribirEnFichero($texto){
  $fecha=getdate(date("U"));
  $nombreFichero = "$fecha[hours]$fecha[minutes]$fecha[month]$fecha[mday]$fecha[year]";

  $fichero = fopen($nombreFichero . ".txt", "a") or die("Unable to open file!");
  fwrite($fichero, $texto);

  fclose($fichero);
}//de function

//-----------------------------------------------------------------------

function buscarGanadoresBancaMenor21($puntuaciones,$puntosBanca){
  $ganadores=array();
  foreach ($puntuaciones as $jugador => $puntos) {
    if($jugador!="Banca" && $puntos>$puntosBanca  && $puntos<21){
      $ganadores[$jugador]=$puntos;
    }//de if
  }//de foreach
  return $ganadores;
}//de function

//------------------------------------------------------------------------

function buscarGanadoresBancaMayor21($puntuaciones){
  $ganadores=array();
  foreach ($puntuaciones as $jugador => $puntos) {
    if($jugador!="Banca" && $puntos<=21){
      $ganadores[$jugador]=$puntos;
    }//de if
  }//de foreach
  return $ganadores;
}//de function

//---------------------------------------------------------------------------

function buscarGanadoresBanca21($puntuaciones){
  $ganadores=array();
  foreach ($puntuaciones as $jugador => $puntos) {
    if($jugador!="Banca" && $puntos==21){
      $ganadores[$jugador]=$puntos;
    }//de if
  }//de foreach
  return $ganadores;
}//de function
?>

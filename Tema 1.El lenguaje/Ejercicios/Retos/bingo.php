<?php
echo "<html>";
echo "<head>";
echo "<title> Bingo </title>";
echo "<link href=Css/estilos.css rel=stylesheet type=text/css />";
echo "</head>";

echo "<body>";

//creamos los jugadores
$jugador1=array(array(),//carton1
                array(),//carton2
                array());//carton3

$jugador2=array(array(),//carton1
                array(),//carton2
                array());//carton3

$jugador3=array(array(),//carton1
                array(),//carton2
                array());//carton3

$jugador4=array(array(),//carton1
                array(),//carton2
                array());//carton3


//generamos los cartones del jugador1
echo "Jugador 1 <br><br>";
for($i=0;$i<count($jugador1);$i++){
  $jugador1[$i]=crearCarton();
  $jugadorActual=$jugador1[$i];


  for($j=0;$j<count($jugadorActual);$j++){//mostramos el carton

    if($j==0){
      echo  "<table>";
      echo "Cartón " . $i;
      echo "<tr>";
    }//de if
    else if($j==count($jugadorActual)-1){
        echo "</tr>";
        echo "</table>";
    }
    else{
        echo "<td>". $jugadorActual[$j]. "</td>";
    }
  }//de for 2
}//de for
echo "<br><br><br>";

//generamos los cartones del jugador2
echo "Jugador 2 <br><br>";
for($i=0;$i<count($jugador2);$i++){
  $jugador2[$i]=crearCarton();
  $jugadorActual=$jugador2[$i];


  for($j=0;$j<count($jugadorActual);$j++){//mostramos el carton

    if($j==0){
      echo  "<table>";
      echo "Cartón " . $i;
      echo "<tr>";
    }//de if
    else if($j==count($jugadorActual)-1){
        echo "</tr>";
        echo "</table>";
    }
    else{
        echo "<td>". $jugadorActual[$j]. "</td>";
    }
  }//de for 2
}//de for
echo "<br><br><br>";
//var_dump($jugador2);

//generamos los cartones del jugador3
echo "Jugador 3 <br><br>";
for($i=0;$i<count($jugador3);$i++){
  $jugador3[$i]=crearCarton();
  $jugadorActual=$jugador3[$i];

  for($j=0;$j<count($jugadorActual);$j++){//mostramos el carton

    if($j==0){
      echo  "<table>";
      echo "Cartón " . $i;
      echo "<tr>";
    }//de if
    else if($j==count($jugadorActual)-1){
        echo "</tr>";
        echo "</table>";
    }
    else{
        echo "<td>". $jugadorActual[$j]. "</td>";
    }
  }//de for 2
}//de for
echo "<br><br><br>";
//var_dump($jugador3);

//generamos los cartones del jugador4
echo "Jugador 4 <br><br>";
for($i=0;$i<count($jugador4);$i++){
  $jugador4[$i]=crearCarton();
  $jugadorActual=$jugador3[$i];

  for($j=0;$j<count($jugadorActual);$j++){//mostramos el carton

    if($j==0){
      echo  "<table>";
      echo "Cartón " . $i;
      echo "<tr>";
    }//de if
    else if($j==count($jugadorActual)-1){
        echo "</tr>";
        echo "</table>";
    }
    else{
        echo "<td>". $jugadorActual[$j]. "</td>";
    }
  }//de for 2
}//de for
//var_dump($jugador4);
//----------------------------------------------------------------------------------------------------------------------------

//jugamos
$ganador=jugarBingo($jugador1,$jugador2,$jugador3,$jugador4);
echo "<p> El ganador es-->"; echo $ganador; echo "</p>";
//------------------------------------------------------------------------------------------------------
function crearCarton(){
  $array=array();

  for($i=0;$i<15;$i++){
    do{
      $numero=rand(1,60);
    }while(in_array($numero,$array)==true);

    array_push($array,$numero);
  }//de for
  return $array;
}//de crear carton

//------------------------------------------------------------------------------------------------------------------

function jugarBingo($jugador1,$jugador2,$jugador3,$jugador4){

  $aciertosJugador1=array(0,//carton1 aciertos
                          0,//carton2 aciertos
                          0);//carton3 aciertos

  $aciertosJugador2=array(0,//carton1 aciertos
                          0,//carton2 aciertos
                          0);//carton3 aciertos

  $aciertosJugador3=array(0,//carton1 aciertos
                          0,//carton2 aciertos
                          0);//carton3 aciertos

  $aciertosJugador4=array(0,//carton1 aciertos
                          0,//carton2 aciertos
                          0);//carton3 aciertos

$bomboBolasSacadas=array();
$ganador="";

while($aciertosJugador1[0]<15 && $aciertosJugador1[1]<15  && $aciertosJugador1[2]<15
  && $aciertosJugador2[0]<15 && $aciertosJugador2[1]<15 && $aciertosJugador2[2]<15
&& $aciertosJugador3[0]<15 && $aciertosJugador3[1]<15 && $aciertosJugador3[2]<15
&& $aciertosJugador4[0]<15 && $aciertosJugador4[1]<15 && $aciertosJugador4[2]<15){

do{//comprobamos que la bola no haya salido antes
  $bola=rand(1,60);//sacamos la bola

}while(in_array($bola,$bomboBolasSacadas)==true);

echo "<img src=./imagenes/".$bola.".PNG>";

  for($cont=0;$cont<=3 ;$cont++){//vamos a comprobar en los cartones en los que está la bola
    $numJugador=$cont+1;
    if(in_array($bola,${"jugador".($cont+1)}[0])){//en el primer carton
        ${"aciertosJugador".($cont+1)}[0]++;
    }//de if

    if(in_array($bola,${"jugador".($cont+1)}[1])){ //si esta en el segundo carton
        ${"aciertosJugador".($cont+1)}[1]++;
    }//de if

    if(in_array($bola,${"jugador".($cont+1)}[2])){//si esta en el tercer carton
        ${"aciertosJugador".($cont+1)}[2]++;
    }//de if

    if(in_array(15,${"aciertosJugador".$numJugador})){
      $numCarton=array_search(15,$aciertosJugador1);
      $ganador=$ganador ."El jugador ". $numJugador ." ha cantado bingo<br>";
    }//de if
  }//de for

  array_push($bomboBolasSacadas,$bola);
}//de while

var_dump(array_merge($aciertosJugador1,$aciertosJugador2,$aciertosJugador3,$aciertosJugador4));
return $ganador;

}//de jugarBingo

echo "</body>";
echo "</html>"
?>

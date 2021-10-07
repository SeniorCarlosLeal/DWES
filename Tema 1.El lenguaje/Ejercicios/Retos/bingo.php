<?php
echo "<html>";
echo "<head>";
echo "<title> Bingo </title>";
echo "</head>";

echo "<body>";
//creo el carton
$carton=crearCarton();
//enseño el carton
var_dump($carton);

//creo el bombo
$bombo=array();
for($i=1;$i<61;$i++){
  $bombo[$i]=$i;
}
//enseño el bombo;
var_dump($bombo);

//jugamos
$ganador=jugarBingo($carton);
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

function jugarBingo($carton){
  $aciertos=0;

  while($aciertos<15){
    $bola=rand(1,60);
    if(in_array($bola,$carton)){
      $aciertos++;
    }//de if

  }//de while
  return " Carlos";
}//de jugarBingo

echo "</body>";
echo "</html>"
?>

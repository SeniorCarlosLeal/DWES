<?php

//ESCRIBIR EN UN FICHERO EL NUMERO DE CADA ACIERTO Y MOSTRARLO EN PANTALLA UNA VEZ ESCRITO

function generarCombiancionGanadora(){//generamos la combinacion generarCombiancionGanadora
  $array=array();


  for($i=0;$i<7;$i++){//vamos a generar los 6 primeros numeros y el complementario

    do {//generamos las bolas y sacamos bolas hasta que salga 1 que no haya salido anteriormente
      $numero=rand(1,49);
    } while (in_array($numero,$array));

    array_push($array,$numero);//añadimos las bolas al array
  }//de for

  //una vez hayamos generado los 6 numeros + el complementario, generamos el reintregro

  $reintegro=rand(1,9);
  array_push($array,$reintegro);//añadimos el reintegro a la combianacion ganadora

  //Una vez tenemos toda la combinacion ganadora vamos a mostrarla

  mostrarCombiancion($array);//mostramos por pantalla la combinacion de ganadores
  verGanadores($array);//Buscamos todos los acertantes
}//de fucntion

//-----------------------------------------

function mostrarCombiancion($combinacionGanadora){

  $tamanio=count($combinacionGanadora);
  echo "<h3>NÚMEROS</h3><br>";
  for($i=0;$i<$tamanio;$i++) {//para cada numero vamos a sacar su bola correspondiente
    if($i==7){
      echo  "<h3>Reintegro</h3><img id=bolas src=./imagenes/rbola".$combinacionGanadora[$i].".PNG>". "<br>";//moostramos el reintegro
    }
    else if ($i==6){
      echo  "<br><h3>Complementario</h3><img id=bolas src=./imagenes/".$combinacionGanadora[$i].".PNG><br>";//mostramos el complementario
    }
    else{
      echo  "<img id=bolas src=./imagenes/".$combinacionGanadora[$i].".PNG>";//buscamos la combiancion de numeros ganadores
    }

  }//de for each

}//de fucntion

//-------------------------------------------------------------------------------

function verGanadores($combinacionGanadora){
  $fichero=fopen("./Ficheros/r22_primitiva.txt", "r") or die("Unable to open file!");//abrimos el fichero para ver todos los usuarios que han participado en el sorteo

  fgets($fichero);//saltamos la primera llinea del fichero ya que ahi no hay combinaciones, solo las categorias

  $aciertos = array(0,0,0,0,0,0,0,0,0);//un array que controle los aciertos

  while(!feof($fichero)){
    $fila=fgets($fichero);

    $aciertosEnFila=comprobarAciertosFila($fila,$combinacionGanadora);//iremos fila por fila (jugador por jugador) comprobando los aciertos y lo guardamos en una variable

    if($aciertosEnFila==5 && jugadorCincoAciertos($fila,$combinacionGanadora)==1){
      $aciertos[6]++;
    }//si hay 5 aciertos vamos a comprobar si acierta el complementario tambien

    else if($aciertosEnFila==5 && jugadorCincoAciertos($fila,$combinacionGanadora)==0){
      $aciertos[5]++;
    }//si hay 5 aciertos vamos a comprobar si acierta el complementario tambien

    else if($aciertosEnFila==6){
      $aciertos[7]++;
    }//hay que controlar si son 6 aciertos para incrementar en el array el contador correcto

    else{
      $aciertos[$aciertosEnFila]++;
    }//el resto se incrementa la posicion que es igual al numero de aciertos

    if (comprobarReintegros($fila,$combinacionGanadora)==1){
      $aciertos[8]++;
    }//ahora comprobamos el reintegro

  }//de while
  fclose($fichero);
  //UNA VEZ TENEMOS LOS ACIERTOS VAMOS A ESCRIBIRLO EN UN FICHERO

  escribirEnFichero($aciertos);

}//de fucntion

//------------------------------------------------

function comprobarAciertosFila($fila,$combinacionGanadora){
  $filaDividida=explode("-",$fila);
  //var_dump($filaDividida);
  $tamanio=count($combinacionGanadora);
  $cont=0;
  //var_dump($combinacionGanadora);
  //var_dump($filaDividida);

  for ($i=0; $i <$tamanio-2 ; $i++) {
    //  echo "Combinacion ".$combinacionGanadora[$i]."<br>";
    //  echo "Fila ".$filaDividida[$i+1]."<br>";
    if($combinacionGanadora[$i]==$filaDividida[$i+1]){
      $cont++;
    }//de if
  }//de for 1

  //  echo "CONT->".$cont."<br>";
  return $cont;

  //var_dump($filaDividida);
}//de function


//---------------------------------------------------------------------------------------------

function jugadorCincoAciertos($fila,$combinacionGanadora){//controlamos si al acertar 5 numeros, también acierta el complementario
  $filaDividida=explode("-",$fila);

  if($filaDividida[7]==$combinacionGanadora[6]){
    return 1;
  }//de if

  else{
    return 0;
  }
}//de function

//------------------------------------------------------------------------

function comprobarReintegros($fila,$combinacionGanadora){
  $filaDividida=explode("-",$fila);
  //var_dump($combinacionGanadora);
  //  echo $filaDividida[8]."<br>";
  if($filaDividida[8]==$combinacionGanadora[7]){
    return 1;
  }//de if
  else{
    return 0;
  }//de else
}//de fucntion

//---------------------------------------------------------------------

function escribirEnFichero($aciertos){
  $nombreFichero="Ficheros/aciertos.txt";
  if(file_exists($nombreFichero)){//si existe el fichero vamos a borrarlo para que escriba los nuevos Acertantes
    unlink($nombreFichero);
    //  echo "hola";
  }//de if

  else{//si el fichero no existe lo creamos
    $fichero = fopen("./Ficheros/aciertos.txt", "a") or die("Unable to open file!");
  }
  $fichero = fopen("./Ficheros/aciertos.txt", "a") or die("Unable to open file!");//lo creamos si lo hemos borrado
  $tamanio=count($aciertos);

  for($i=0;$i<$tamanio;$i++){

    if($i==0){
      $texto="Acertantes " . $i. " numeros: " . $aciertos[$i];//escribimos el numero de gente con 0 aciertos
      fwrite($fichero, $texto);
    }//si es la primera linea no metemos salto de linea

    else if($i==6){
      $texto="\n" . "Acertantes  5  numeros y Complementario: " . $aciertos[$i];
      fwrite($fichero, $texto);
    }//controlamos que estamos escribiendo el numero de 5 aciertos + complementario ya que no coincide con el indice

    else if($i==7){
      $texto="\n" . "Acertantes  6 numeros : " . $aciertos[$i];//escribimos el numero de gente con 6 aciertos
      fwrite($fichero, $texto);
    }//de else if

    else if($i==8){
      $texto="\n" . "Acertantes reintegro numeros : " . $aciertos[$i];//escribimos el numero de gente con 6 aciertos
      fwrite($fichero, $texto);
    }//controlamos que escribimos el numero de acertantes de reintegros

    else{
      $texto="\n" . "Acertantes  " . $i. " numeros  " . $aciertos[$i];//escribimos el numero de gente con 6 aciertos
      fwrite($fichero, $texto);
    }//en cualquier otro caso coincide el indice con el numero de aciertos
  }//de for

  fclose($fichero);

  //una vez creado el fichero lo vamos a leer y a mostrar en pantalla
  mostrarGanadores();
}//de function

//-------------------------------------------

function mostrarGanadores(){
  $ficheroAciertos=fopen("./Ficheros/aciertos.txt","r") or die ("Unable to open file!");//abrimos el fichero en modo lectura

  while(!feof($ficheroAciertos)) {//leemos una linea y la mostramos hasta fin de fichero
    echo fgets($ficheroAciertos) . "<br>";
  }//de while
}//de function

//--------------------------------------------------------

function premios($recaudacion,$fechasorteo){
  //Guardaremos la distribucion de premios en un fichero

  $fichero = fopen("./Ficheros/premios".$fechasorteo.".txt", "a") or die("Unable to open file!");

  $texto= "Para los acertantes de 6 aciertos les correspoden " . ((40*$recaudacion)/100). "\n";
  fwrite($fichero, $texto);
  $texto= "Para los acertantes de 5 aciertos + complementario les correspoden " . ((30*$recaudacion)/100). "\n";
  fwrite($fichero, $texto);
  $texto= "Para los acertantes de 5 aciertos les correspoden " . ((15*$recaudacion)/100). "\n";
  fwrite($fichero, $texto);
  $texto= "Para los acertantes de 4 aciertos les correspoden " . ((5*$recaudacion)/100). "\n";
  fwrite($fichero, $texto);
  $texto= "Para los acertantes de 3 aciertos les correspoden " . ((8*$recaudacion)/100). "\n";
  fwrite($fichero, $texto);
  $texto= "Para los acertantes de reintegros aciertos les correspoden " . ((2*$recaudacion)/100). "\n";
  fwrite($fichero, $texto);
}//de function

?>

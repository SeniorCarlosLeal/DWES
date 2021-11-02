<?php

function generarDadosJugador($numDados){//funcion que genera los dados y los guarda en la tabla

  $numerosGenerados="";

  for($i=0;$i<$numDados;$i++){//generamos los numeros que van a salir y los guardamos en un string y lo hacemos tantas veces como el numero de dados con el que se juega

    if($i==$numDados-1){//contemplamos cual es el ultimo para no poner una coma de más que luego se pueda interpretar como un dado sin numero
      $numerosGenerados=$numerosGenerados . rand(1,6);
    }//de if
    else{
      $numerosGenerados=$numerosGenerados . rand(1,6) . ",";
    }//de else
  }//de for

  $numeros = explode(",",$numerosGenerados);
  //var_dump($numeros);
  $tamanioNumeros=count($numeros);

  for($i=0;$i<$tamanioNumeros;$i++){
    echo "<td>" .  "<img src=./images/".$numeros[$i].".PNG>" . "</td>";
  }//de for

  return $numeros;
}//de function

function puntuacionJugador($dados){//funcion que determina la puntuacion de un jugador a partir de los dados que le han salido

  $suma=0;
  $tamanio=count($dados);

  if($tamanio=="1"){
    for($i=0;$i<$tamanio;$i++){//recorremos el valor de cada dado
      $suma+=intval($dados[$i]);
    }//de for
  }//de if

  else{//si se juga con 2 o más dados tenemos que comprobar si todos los dados son inguales
    $continua=true;

    for($i=0;$i<$tamanio;$i++){//recorremos el valor de cada dado
      $suma+=intval($dados[$i]);

      if($i!=$tamanio-1){//realizo esta comprobacion para que no se salga de rango al comparar la última posicion
        if( (intval($dados[$i+1]) != intval($dados[$i])) && ($continua==true) ){//en el caso de que no sean iguales Y ya se haya cambiado la variable que comprueba si son iguales o no (histórico)
                                                                              //tenemos que decir que haga la suma de los valores de manera normal
          $continua=false;
        }//de if
      }//de if
    }//de for

    if($continua==true){//si todos los dados han sido iguales, la puntuación es 100
      $suma=100;
    }//de if
  }//de else
  return $suma;//devuelvo el resultado
}//de function

function ganadorDados($puntuacionJ1,$puntuacionJ2,$puntuacionJ3,$puntuacionJ4,$nomJugador1,$nomJugador2,$nomJugador3,$nomJugador4){
  $salida="<br>";
  $puntuacionMaxima=0;
  $cont=0;

  //Comprobaremos si la puntuacion de cada jugador es mayor que la de sus rivales y que la puntuacionmaxima que hay en ese momento
  if( (($puntuacionJ1>=$puntuacionJ2) && ($puntuacionJ1>=$puntuacionJ3) && ($puntuacionJ1>=$puntuacionJ4)) && ($puntuacionJ1>=$puntuacionMaxima) ){
    $salida=$salida .$nomJugador1 . "<br>";
    $cont++;
  }//de if

  if( (($puntuacionJ2>=$puntuacionJ1) && ($puntuacionJ2>=$puntuacionJ3) && ($puntuacionJ2>=$puntuacionJ4)) && ($puntuacionJ2>=$puntuacionMaxima) ){
    $salida=$salida .$nomJugador2 . "<br>";
    $cont++;
  }//de if

  if( (($puntuacionJ3>=$puntuacionJ2) && ($puntuacionJ3>=$puntuacionJ1) && ($puntuacionJ3>=$puntuacionJ4)) && ($puntuacionJ3>=$puntuacionMaxima) ){
    $salida=$salida  .$nomJugador3 . "<br>";
    $cont++;
  }//de if

  if( (($puntuacionJ4>=$puntuacionJ2) && ($puntuacionJ4>=$puntuacionJ3) && ($puntuacionJ4>=$puntuacionJ1)) && ($puntuacionJ4>=$puntuacionMaxima) ){
    $salida=$salida  .$nomJugador4 . "<br>";
    $cont++;
  }//de if

  //Mostramos los ganadores
  echo $salida;
  //Mostramos cuantos ganadores hay
  echo "<br>Hay " . $cont . " ganadores";

}//de function

 ?>

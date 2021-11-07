<?php

function mostrar($linea){
  $valor=substr($linea,0,32);
  $ultimo=substr($linea,32,8);
  $varianzaPorcentaje=substr($linea,40,8);
  $varianza=substr($linea,48,8);
  $accionesAnio=substr($linea,56,16);
  $maximo=substr($linea,72,8);
  $minimo=substr($linea,80,8);
  $vol=substr($linea,88,16);
  $capital=substr($linea,104,8);

  echo "<tr>
  <td>$valor</td>
  <td>$ultimo</td>
  <td>$varianzaPorcentaje</td>
  <td>$varianza</td>
  <td>$accionesAnio</td>
  <td>$maximo</td>
  <td>$minimo</td>
  <td>$vol</td>
  <td>$capital</td>
  </tr>";
}//de function

//----------------------------------------------------------------------------------------

function sacarDatosNombre($nombre,$fichero){
  $continua=true;
  while(!feof($fichero) && $continua==true){
    $fila=fgets($fichero);
    //comprobamos si el valor introducido está en esta fila
    if(estaEnEstaFila($fila,$nombre)==true){
      $continua=false;
      $filaImprimir=str_replace(" ","||",$fila);
      echo $filaImprimir;
    }//de if
  }//de while

  if($continua==true){
    echo "<h1>NO EXISTE EL NOMBRE INTRODUCIDO</h1>";
  }//de if

}//de function
//----------------------------------------------------------------------------------------

function estaEnEstaFila($fila,$nombre){
  if (stristr($fila, $nombre) == false) {
    return false;
  }//de if
  else {
    return true;
  }
}//de fucntion

//--------------------------------------------------------------------------------------

function mostrarDatos($empresa1,$empresa2,$camposAMostrar,$fichero){

  $campos=explode("/",$camposAMostrar);
  $tamanioCampos=count($campos);
  $cont=0;

  while(!feof($fichero) && $cont<2){
    $fila=fgets($fichero);
    //comprobamos si el valor introducido está en esta fila
    if(estaEnEstaFila($fila,$empresa1)==true || estaEnEstaFila($fila,$empresa2)==true){//comprobamos si alguna de las 2 empresas está en la fila que estamos comprobando
      if($cont==0){//hacemos un diva para diferenciar la empresa 1 de la 2
        echo "<div>";
        echo $empresa1."<br><br>";
      }//de if

      else{
        echo "<div>";
        echo $empresa2."<br><br>";
      }
      for($i=0;$i<$tamanioCampos;$i++){//recorremos los campos que queremos mostrar
        echo $campos[$i]."-->";
        echo imprimirCampos($campos[$i],$fila);//imprimimos el nombre del campo y el valor que tiene en dicha fila
      }//de for
      echo "<br></div>";
      $cont++;
    }//de if
  }//de while


}//de fucntion

//---------------------------------------------------------------------------

function imprimirCampos($valor,$linea){
  switch ($valor) {
    case 'Ultimo':
    return substr($linea,32,8)."<br>";
    break;

    case 'Var.%':
    return substr($linea,40,8)."<br>";
    break;

    case 'Var.';
    return substr($linea,48,8)."<br>";
    break;

    case 'Ac.% año';
    return substr($linea,56,16)."<br>";
    break;

    case 'Max.';
    return substr($linea,72,8)."<br>";
    break;

    case 'Min.';
    return substr($linea,80,8)."<br>";
    break;

    case 'Vol.';
    return substr($linea,88,16);
    break;

    case 'Capit.';
    return substr($linea,104,8)."<br>";
    break;

    default://si el campo que esta buscando no lo encuentra es que hay un error
    return "<h2>Error a la hora de introucir los campos a mostrar</h2>";
    break;
  }
}//de fucntion

//--------------------------------------------------------------------------------------------

function mostrarMedia($fichero,$empresa1,$empresa2){
  $cont=0;
  $acum=0;
  rewind($fichero);
  while(!feof($fichero) && $cont<2){
    $fila=fgets($fichero);
    //comprobamos si el valor introducido está en esta fila

    if(estaEnEstaFila($fila,$empresa1)==true || estaEnEstaFila($fila,$empresa2)==true){//comprobamos si alguna de las 2 empresas está en la fila que estamos comprobando
      $valor=intval(str_replace(".","",imprimirCampos("Vol.",$fila)));
      $acum=$acum+$valor;
      //echo $acum;
      $cont++;
    }//de if
  }//de while
  echo "El valor medio del volumen = ".($acum/2);
}//de mostrar media

//-----------------------------------------------------------------------------------------------------

function totales($empresa1,$empresa2,$fichero){
  $cont=0;
  $sumaVolumen=0; $sumaCapitalizado=0;

  while(!feof($fichero) && $cont<2){
      $fila=fgets($fichero);

      if(estaEnEstaFila($fila,$empresa1)==true || estaEnEstaFila($fila,$empresa2)==true){//comprobamos si alguna de las 2 empresas está en la fila que estamos comprobando
        $valorVolumen=intval(str_replace(".","",imprimirCampos("Vol.",$fila)));
        $sumaVolumen=$sumaVolumen+$valorVolumen;

        $valorCapitalizado=intval(str_replace(".","",imprimirCampos("Capit.",$fila)));
        $sumaCapitalizado=$sumaCapitalizado+$valorCapitalizado;
        //echo $acum;
        $cont++;
      }//de if

  }//de while

  echo "Volumen de las dos empresas = " . $valorVolumen."<br>";
  echo "Capitalizado de las dos empresas = " . $valorCapitalizado."<br>";
}//de totales

//-------------------------------------------------------------------------------------------------

function total($eleccion,$fichero){
  if($eleccion=="volumen"){
    $sumaTotalVol=0;

    while(!feof($fichero)){
        $fila=fgets($fichero);

        $valor=intval(str_replace(".","",substr($fila,88,16) ) );

        $sumaTotalVol=$sumaTotalVol+$valor;
    }//de while
    echo "<div>
            <h3>TOTAL VOLUMEN</h3>
            $sumaTotalVol";
  }//de if

  else{
    $sumaTotalCapit=0;

    while(!feof($fichero)){
        $fila=fgets($fichero);

        $valor=intval(str_replace(".","",substr($fila,104,8) ) );

        $sumaTotalCapit+=$valor;
    }//de while
    echo "<div>
            <h3>TOTAL CAPITALIZACIÓN</h3>
            $sumaTotalCapit";
  }//de else
}//de fucntion

//------------------------------------------------------------------------------------------------

function totalesFichero($fichero){
  $fila=fgets($fichero);

  $maxCapit=PHP_INT_MIN;
  $minCapit=PHP_INT_MAX;

  $maxVol=PHP_INT_MIN;
  $minVol=PHP_INT_MAX;

  while(!feof($fichero)){
      $fila=fgets($fichero);

      $actualMaxCapit=intval(str_replace(".","",substr($fila,104,8) ) );
      $actualMinCapit=intval(str_replace(".","",substr($fila,104,8) ) );

      $actualMaxVol=intval(str_replace(".","",substr($fila,88,16) ) );
      $actualMinVol=intval(str_replace(".","",substr($fila,88,16) ) );

      if($actualMaxCapit>$maxCapit){
        $maxCapit=$actualMaxCapit;
      }//de if

      if($actualMinVol<$minCapit){
        $minCapit=$actualMinCapit;
      }//de if

      if($actualMaxVol>$maxVol){
        $maxVol=$actualMaxVol;
      }//de if

      if($actualMinVol<$minVol){
        $minVol=$actualMinVol;
      }//de if
  }//de while

  echo "<div>
          <h3>Maximo Capital</h3>
          $maxCapit
          <h3>Minimo Capital</h3>
          $minCapit
        </div>";

        echo "<div>
                <h3>Maximo Volumen</h3>
                $maxVol
                <h3>Minimo Volumen</h3>
                $minVol
              </div>";

}//de function

?>

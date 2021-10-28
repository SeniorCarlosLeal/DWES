<?php

function mostrarFichero($nombreFichero){

  if(file_exists("Ficheros/".$nombreFichero)){
    $fichero=fopen("Ficheros/".$nombreFichero,"r") or die("Ilegible");
    echo file_get_contents("Ficheros/".$nombreFichero);
  }
  else{
    echo "El fichero indicado no existe en la ruta indicada";
  }//de else
}//de function

//-----------------------------------------------------------------------------------

function mostrarLineaFichero($nombreFichero,$numLinea){
  if(file_exists("Ficheros/".$nombreFichero)){
    $fichero=fopen("Ficheros/".$nombreFichero,"r") or die("Ilegible");
    $cont=0;

    while($cont<=$numLinea){

      if($cont==$numLinea){
        echo $lineaAMostrar;
      }//de if
      else{
        $lineaAMostrar=fgets($fichero);
      }//de else
      $cont++;
    }//de while
  }//de if
  else{
    echo "El fichero indicado no existe en la ruta indicada";
  }//de else
}//de fucntion
//-----------------------------------------------------------------------------------

function mostrarNLineasFichero($nombreFichero,$primerasLineas){
  if(file_exists("Ficheros/".$nombreFichero)){
    $fichero=fopen("Ficheros/".$nombreFichero,"r") or die("Ilegible");
    $cont=0;

    do{
      echo fgets($fichero);
      $cont++;
    }while($cont!=$primerasLineas);
  }//de if
  else{
    echo "El fichero indicado no existe en la ruta indicada";
  }//de else
}//de function

?>

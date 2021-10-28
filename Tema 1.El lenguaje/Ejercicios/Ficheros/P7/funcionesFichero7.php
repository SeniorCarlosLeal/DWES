<?php

  function copiarFichero($ficheroOrigen,$ficheroDestino){
    if(file_exists($ficheroOrigen)==true){
      copy($ficheroOrigen,$ficheroDestino);
      echo "El fichero " . basename($ficheroOrigen) . " se ha copiado con exito al fichero " . basename($ficheroDestino);
    }//de if
    else{
      echo "Error, la ruta del fichero de origen es errónea";
    }//de else
  }//de fucntion

  function renombrarFichero($ficheroOrigen,$ficheroDestino){
    if(file_exists($ficheroOrigen)==true){
      rename($ficheroOrigen,$ficheroDestino);
      echo "El fichero " . $ficheroOrigen . " se ha renombrado con exito al fichero " . $ficheroDestino;
    }//de if
    else{
      echo "Error, la ruta del fichero de origen es errónea";
    }//de else
  }

  function borrarFichero($ficheroOrigen){
    if(file_exists($ficheroOrigen)==true){
      unlink($ficheroOrigen);
      echo "El fichero " . $ficheroOrigen . " se ha borrado con exito";
    }//de if
    else{
      echo "Error, la ruta del fichero de origen es errónea";
    }//de else
  }
 ?>

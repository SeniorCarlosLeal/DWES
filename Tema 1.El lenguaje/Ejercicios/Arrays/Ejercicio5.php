<?php

echo "<html>
        <head> <title> Ejercicio 5 </title>
        <link href=Css/estilos.css rel=stylesheet type=text/css />
        </head>
        <body>
        <center>";


  $arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
  $arr2 = array("Sistemas Informáticos","FOL","Mecanizado");
  $arr3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

  //-------------------PARTE A--->SIN FUNCIONES DE ARRAYS-----------------------------------------------------------------------------------------------------------

  //Comentamos para poder hacer el resto de las partes y que lo he hecho en esta parte no influya

        // $arr1[3]=$arr2[0]; $arr1[4]=$arr2[1]; $arr1[5]=$arr2[2]; $arr1[6]=$arr3[0]; $arr1[7]=$arr3[1]; $arr1[8]=$arr3[2]; $arr1[9]=$arr3[3]; $arr1[10]=$arr3[4];
        //echo "<p> "; print_r($arr1); echo "</p>";

  //----------------------------------------------------------------------------------------------------------------------------------------------------------------

  //-------------------PARTE B--->USANDO ARRAY_MERGE()--------------------------------------------------------------------------------------------------------------

    //Comentamos para poder hacer el resto de las partes y que lo he hecho en esta parte no influya
        //echo "<p>"; print_r(array_merge($arr1,$arr2,$arr3)); echo "</p>";

//------------------------------------------------------------------------------------------------------------------------------------------------------------------

//--------------------------------------PARTE C--->USANDO ARRAY_PUSH()----------------------------------------------------------------------------------------------

  for($i=0;$i<count($arr2);$i++){
    array_push($arr1, "$arr2[$i]");
  }#de for

  for($i=0;$i<count($arr3);$i++){
    array_push($arr1, "$arr3[$i]");
  }#de for

  echo "<p>"; print_r($arr1); echo "</p>";

  echo "</body>
        </center>
        </html>";
?>

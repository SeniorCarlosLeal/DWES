<?php

echo "<html>
<head> <title> Ejercicio 7 </title>
<link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>";

$arrAlumnos=array("Carlos Leal Álvarez"=>23, "Daniel Ferrera Cubero"=>19, "Sergio Muñoz"=>33, "Sergio Bravo"=>21, "Juan Pablo Gónzalez"=>21);

//-------------------------APARTADO A--> Mostrar el contenido del array utilizando bucles-------------------
echo "<ul>";
foreach ($arrAlumnos as $nombre => $edad) {
  echo "<li>"; echo "Nombre -->" . $nombre . "  || Edad-->" . $edad. "</br>";echo "</li>";
}#de for each
echo "</ul>";

//-------------------------APARTADO B y C--> Sitúa el puntero en la segunda posición del array y muestra su valor-------------------

echo "El puntero ahora apunta al primer elemento " .  current($arrAlumnos) . "</br>";
next($arrAlumnos);//movemos el puntero interno
echo "El puntero apunta al segundo elemento " . current($arrAlumnos) . "</br>";

//------------------------APARTADO D-->Coloca el puntero en la última posición y muestra el valor----------------------------------

end($arrAlumnos);//situamos el puntero en el ultimo elemento del array
echo "El puntero apunta al último elemento " . current($arrAlumnos) . "</br>";

//------------------------APARTADO E-->Ordena el array por orden de edad (de menor a mayor) y muestra la primera posición del array y la última.----------------------------------

asort($arrAlumnos);//ordenamos por valor (la edad), NO POR CLAVE (LOS NOMBRES)
echo "La última posición " . end($arrAlumnos) . " y la primera " . reset($arrAlumnos) . "<br>";
print_r($arrAlumnos);

echo "</body>
</html>";
 ?>

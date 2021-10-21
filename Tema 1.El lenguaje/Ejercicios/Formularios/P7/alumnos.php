<?php

echo "<html lang=es dir=ltr>
<head>
<meta charset=utf-8>
<title>Alumnos</title>
<style>
table, th, td {
  border:2px solid black;
  border-collapse:collapse;
  padding:4px;
}
</style>
</head>
<body>

<h1>Datos Alumnos</h1>";

if(empty($_POST["nombre"]) || empty($_POST["apellido1"]) || empty($_POST["apellido2"]) || empty($_POST["email"]) || empty($_POST["sexo"]) ){
  echo "Rellene todos los campos";
}//de if

else{
  $nombreAlumno=$_POST["nombre"];
  $apellido1Alumno=$_POST["apellido1"];
  $apellido2Alumno=$_POST["apellido2"];
  $emailAlumno=$_POST["email"];
  $sexoAlumno=$_POST["sexo"];

  echo "<table style=width:60%>
  <tr>
  <td>Nombre</td>
  <td>Apellido 1</td>
  <td>Apellido 2 </td>
  <td>E-Mail</td>
  <td>Sexo</td>
  </tr>
  <tr>
  <td>$nombreAlumno</td>
  <td>$apellido1Alumno</td>
  <td>$apellido2Alumno</td>
  <td>$emailAlumno</td>
  <td>$sexoAlumno</td>
  </tr>
  </table>";
}//de else

?>

<!DOCTYPE html>
<?php
require 'altaCliente.php';
$nombre=cookieNombre();
echo($nombre);
$apellidos=cookie()[1];
$cookie_name=$nombre;
$cookie_value=$apellidos;

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Alta cliente</title>
</head>

<body>

    <?php

    if(!isset($_COOKIE[$cookie_name])) {
      echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
      echo "Cookie '" . $cookie_name . "' is set!<br>";
      echo "Value is: " . $_COOKIE[$cookie_name];
    }

    ?>


</body>
</html>

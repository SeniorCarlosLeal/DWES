<?php

require("config.php");
require("../Funciones/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $baseDatos=conexion();

  $username=$_POST["username"];
  $passwd=$_POST["password"];
  $salida=0;

  $stmt = $baseDatos->prepare("SELECT NIF from cliente where NOMBRE='$username' and password='$passwd'");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    $salida++;
    $nifClienteLog=$row["NIF"];
  }//de foreach

  if($salida==1){
    session_start();
    $_SESSION['login_cliente'] = $username;
    $_SESSION['nif_cliente'] = $nifClienteLog;

    header("location: ../operaciones.html");
  }
  else // Si no, el usuario/contraseña no son correctos y por tanto no se loguea al cliente -> muestra mensaje de error
  {
    $error = "Usuario o password incorrectos !!!";
    echo $error;
  }
}

?>

<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    <label>Usuario  :</label><input type = "text" name = "username" class = "box"/><br /><br />
    <label>Clave  :</label><input type = "password" name = "password" class = "box" /><br/><br />
    <input type = "submit" value = "Login"/><br />
  </form>
</body>
</html>

<?php

require_once("./Funciones/funciones.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
$baseDatos=conexion();

$usuario=$_POST['username']; $contrasenia=$_POST['clave'];

$salida=0;

  $stmt = $baseDatos->prepare("SELECT customerNumber from customers where customerNumber='$usuario' and contactLastName='$contrasenia'");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetchAll() as $row) {
    $salida++;
  }//de foreach

  if ($salida==1){

    setcookie("usuario",$contrasenia,time()+(86400*30),"/");
    header("location: menu.html");
  }//de if
  else{
    echo "Contraseña o Usuario incorrectos";
  }//de else
}//de if
 ?>

 <html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    <label>Usuario  :</label><input type = "text" name = "username" class = "box"/><br /><br />
    <label>Clave  :</label><input type = "password" name = "clave" class = "box" /><br/><br />
    <input type = "submit" value = "Login"/><br />
  </form>
</body>
</html>

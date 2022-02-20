<?php

require_once("./views/loginVista.phtml");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once("./models/modelo.php");
  $baseDatos=conexion();
  $inicio=existeEmpleado($baseDatos,$_POST['usuario'],$_POST['contrasenia']);
  if($inicio[0]==1){
    $empleado=$inicio[1];
    setcookie("empleado",$empleado,time()+(86400*30),"/");
    header("location: ./controllers/menu.php");
  }//de if
  else{
    echo "Usuario o contraseña incorrecta";
  }
}//de if

?>

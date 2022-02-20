<?php
if(isset($_COOKIE['empleado'])){
  require_once("../views/menuVista.phtml");
}//de if
else{
  header("location: ./loginController.php");
}//de else

 ?>

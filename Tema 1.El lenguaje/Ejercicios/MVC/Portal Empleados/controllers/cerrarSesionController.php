<?php
setcookie("empleado","",time() - 3600,"/");
setcookie("carrito","",time() - 3600,"/");
header("location: ../index.php");
?>

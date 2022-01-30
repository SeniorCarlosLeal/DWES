<?php
session_start();
session_unset();
session_destroy();
setcookie("PHPSESSID","", time() - 3600);

?>
<html>
<head>
<meta charset="UTF-8"/>
<title>Pagina 3</title>
</head>
<body>
<p>Has Cerrado Sesion</p>
<br /><a href="pe_login.php">Iniciar Sesion</a>
</body>
</html>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Primitiva HTML</title>
  <link href=Css/estilos.css rel=stylesheet type=text/css />
</head>
<body>
	<center>
	<img src="Imagenes/primitiva.jpg">

  <div>
      <?php
      require 'funciones.php';
      generarCombiancionGanadora();
			$recaudacion=$_POST["recaudacion"];
			$fechasorteo=$_POST["fechasorteo"];
			premios($recaudacion,$fechasorteo);
      ?>
  </div>
	</form>
</center>
</body>
</html>

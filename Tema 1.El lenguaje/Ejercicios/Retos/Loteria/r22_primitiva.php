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
		<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<p>Fecha del sorteo <input type='date' name='fechasorteo' size=15><br>
				<p>Recaudación Sorteo <input type='text' name='recaudacion' size=10><br>
					<p>Pulsa para generar combinación ganadora: <input type="submit" value="Combinacion" name="combinacion"></p>
				</form>

				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					require 'funciones.php';
					generarCombiancionGanadora();
					$recaudacion=$_POST["recaudacion"];
					$fechasorteo=$_POST["fechasorteo"];
					premios($recaudacion,$fechasorteo);
				}
				?>

			</center>
		</body>
		</html>

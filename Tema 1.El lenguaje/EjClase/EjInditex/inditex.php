<?php

echo "<html>
	<head>
	<link href=estilos.css rel=stylesheet type=text/css />
	</head>
	<body>";

$datosInditex=array();
//rellenamos el nombre de las empresas


	for($i=0;$i<50;$i++){
		$datosInditex[$i]="Empresa ".$i;
	}//de for

	echo "</center></table>";

	echo "<center>
				<table>
				<tr>";
				$cont=0;
			foreach ($datosInditex as $nombreEmpresa => $valores) {
				$nombreEmpresa="Empresa " .$cont;
				echo "<td class=nombreEmpresa colspan=2>";echo $nombreEmpresa;echo "</td></tr>";
				$valores=array("Dinero "=>rand(1,70), "Valor "=>rand(1,90), "Precio " =>rand(1,100), "Cotizacion " =>rand(1,100), "Subida " =>rand(1,100), "Bajada " =>rand(1,100)
			, "Media " =>rand(1,100));
				$cont++;
				foreach ($valores as $celda => $numeros) {
					echo "<tr>
									<td class=valores>";echo $celda;echo "</td>";echo "<td>";echo $numeros;echo "</td>
								</tr>";
				}//de foreach
			}//de foreach

	echo "</center></table>";
echo "</body></html>";
?>

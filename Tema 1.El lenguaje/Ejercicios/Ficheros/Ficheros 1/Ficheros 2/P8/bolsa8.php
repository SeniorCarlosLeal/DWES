<html>
  <head><title>BOLSA 8</title>
  <link rel="stylesheet" href="Css/estilos.css">
</head>

  <body>
    <center>
      <?php
      require'../funcionesBolsa.php';
      $empresa1=$_POST["nombre1"];
      $valor=$_POST["menu"];
      $fichero=fopen("../Bolsa/ibex35.txt", "r") or die("Unable to open file!");
      mostrarDatos($empresa1,$empresa1,$valor,$fichero);
       ?>
     </center>
  </body>
</html>

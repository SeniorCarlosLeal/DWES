<html>
  <head>
      <title>BOLSA 1</title>
      <style>
        table,th,td{
          border:1px solid black;
          border-collapse: collapse;
        }
      </style>
  </head>

  <body>
    <table style="width:100%">
    <?php
      require '../funcionesBolsa.php';
        $fichero=fopen("../Bolsa/ibex35.txt", "r") or die("Unable to open file!");

        while(!feof($fichero)){
          $linea=fgets($fichero);
          //echo $linea;
          mostrar($linea);
        }//de while
     ?>
  </body>
</html>

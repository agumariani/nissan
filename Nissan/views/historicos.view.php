<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css\bootstrap.min.css">
  <title>Historicos</title>

  <script src="js\FileSaver.min.js"></script>
  <script src="js\tableexport.min.js"></script>
  <script src="js\xlsx.full.min.js"></script>

</head>
<body>
<div class="header">
    <div class="logo"><a href="index.php"><img src="img\logoNissan.png" alt="logo" width="100"></a></div>

    <ul class="nav nav-tabs justify-content-center">
      <?php
        echo $codigoHeader ;
      ?>
    </ul>

    <div>
      <a href=" <?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
    </div>

  </div>
  <div class="container">
    <div class="text-center"><h1>Historicos</h1></div>
    <table class="table table-striped table-bordered mt-3" id="tablaDatos">
      <tr>
        <th>Vendedor</th>
        <th>Modelo</th>
        <th>Dominio</th>
        <th>Kilometros</th>
        <th>Observaciones</th>
        <th>Ultimo service</th>
        <th>Fecha de carga</th>
      </tr>
      <?php
        
        echo $codigo;
        
      ?>  
    </table>
    <div class="grupoBtn">
    <a href="agregarHistorico.php"><button class="btn btn-outline-primary " >Cargar informe</button><a>
    <button class="btn btn-outline-success" id="btnDescargar" >Descargar tabla</button>
    </div>  
  </div>
  <script src="js\script.js"></script>
</body>



</html>
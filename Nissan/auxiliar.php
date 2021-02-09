<?php  
  header('Content-Type: text/xml'); 
  require 'admin/config.php';
  require 'functions.php';
  
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM vehiculos where idVehiculo = '.$_GET['numero']);
  $statement->execute();

  $fila = $statement-> fetch();
  $codigoModelo = '<input type="text" class="form-control" value="" readonly '. $fila["modelo"].'>';

?>
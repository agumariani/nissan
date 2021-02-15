<?php  
  require 'admin/config.php';
  require 'functions.php';
  
  $dominio = $_POST['Dominio'];
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * FROM vehiculos where idVehiculo = '$dominio'");
  $statement->execute();

  $fila = $statement-> fetch();
  $codigoModelo = '<input type="text" class="form-control" value="'. $fila["modelo"].'" readonly >';
  echo $codigoModelo;

  require 'views/agregarHistorico.view.php';

?>
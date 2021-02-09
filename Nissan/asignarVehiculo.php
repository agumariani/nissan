<?php session_start();

require 'admin/config.php';
require 'functions.php';

 
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('empleados', $conexion);

if ($admin['grupo'] == 'administrador') {
  // traer el nombre del usuario
  $user = iniciarSession('empleados', $conexion);

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM vehiculos ');
  $statement->execute();

  $codigo = '<datalist id="vehiculos" onchange="procesar("vehiculo", "modelo")">';
          while($fila = $statement-> fetch()){
          $codigo .= '<option value="'.utf8_encode($fila["idVehiculo"]).'">'.utf8_encode($fila["idVehiculo"]).'</option>';
        }
      $codigo .= '</datalist>';



  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM empleados');
  $statement->execute();

  $codigoVendedor = '<datalist id="vendedores">';
          while($fila = $statement-> fetch()){
            $codigoVendedor .= '<option value="'.utf8_encode($fila["idEmpleado"]).'">'.utf8_encode($fila["idEmpleado"]).'</option>';
          }
      $codigoVendedor .= '</datalist>';

      if(isset($_POST['asignar'])){
        asignarVehiculo($bd_config, $_POST['vehiculo'], $_POST['vendedor']);
      }


  require 'views/asignarVehiculo.view.php';
} else {
  header('Location: '.RUTA.'index.php');
}

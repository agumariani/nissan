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

  $codigo = '<select id="vehiculos" name="vehiculo" class="form-control form-select">';
  $codigo.='<option value="0">Seleccione un vehiculo</option>';

          while($fila = $statement-> fetch()){
          $codigo .= '<option value="'.utf8_encode($fila["idVehiculo"]).'">'.utf8_encode($fila["idVehiculo"]).'</option>';
        }
      $codigo .= '</select>';



  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM empleados');
  $statement->execute();

  $codigoVendedor = '<select id="vendedores" name="vendedor" class="form-control form-select">';
  $codigoVendedor.='<option value="0">Seleccione un vendedor</option>';

          while($fila = $statement-> fetch()){
            $codigoVendedor .= '<option value="'.utf8_encode($fila["idEmpleado"]).'">'.utf8_encode($fila["idEmpleado"]).'</option>';
          }
      $codigoVendedor .= '</select>';

      if(isset($_POST['asignar'])){
        $errores = '';
        if($_POST['vehiculo']==0 || $_POST['vendedor'] == 0){
          $errores .= '<p class="text-center error">Por favor rellene todos los campos</p>';

        }else{
        asignarVehiculo($bd_config, $_POST['vehiculo'], $_POST['vendedor']);
      }
      }


  require 'views/asignarVehiculo.view.php';
} else {
  header('Location: '.RUTA.'index.php');
}

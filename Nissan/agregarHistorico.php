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

  $codigoHeader = '<li class="nav-item">
                    <a class="nav-link pl-3 pr-3 mr-5" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link pl-3 pr-3 mr-5" href="vehiculos.php">Vehiculos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link pl-3 pr-3 mr-5" href="asignarVehiculo.php">Asignar Vehiculo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active pl-3 pr-3" href="historicos.php">Historicos</a>
                  </li>';

} elseif($admin['grupo'] == 'usuario') {
  $user = iniciarSession('empleados', $conexion);

  $codigoHeader = '<li class="nav-item">
                    <a class="nav-link pl-3 pr-3 mr-5" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active pl-3 pr-3" href="historicos.php">Historicos</a>
                  </li>';
 }


$conexion = conexion($bd_config);
$user = iniciarSession('empleados', $conexion);
$idusuario= $user['idEmpleado'];

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * FROM vehiculos_empleados ve, vehiculos v WHERE v.idVehiculo = ve.idVehiculo and ve.idEmpleado =  '$idusuario' ");
  $statement->execute();
  
  $codigo ='<select id="vehiculo" class="form-control form-select col-2" aria-label="Default select example" name="vehiculo">';
  $codigo.='<option value="0">Seleccione un vehiculo</option>';
          while($fila = $statement-> fetch()){
          $codigo .= '<option value="'.utf8_encode($fila["idVehiculo"]).'">'.utf8_encode($fila["idVehiculo"]).'</option>';
          }
  $codigo .= '</select>';

 

    if(isset($_POST["enviar"])){
      $vendedor = $user['idEmpleado'];    
        
      $dominio = limpiarDatos($_POST['vehiculo']);
      $km= limpiarDatos($_POST['km']);
      $observaciones = limpiarDatos($_POST['observaciones']);
      $service = limpiarDatos($_POST['service']);

      $errores = '';

      // validar los campos de texto
      if ($dominio == 0 || empty($modelo) || empty($km) || empty($observaciones) || empty($service)) {
          $errores .= '<p class="text-center error">Por favor rellene todos los campos</p>';
      }
      if($errores == ''){
        agregarHistorico($bd_config, $vendedor, $_POST["vehiculo"], $_POST["km"], $_POST["observaciones"], $_POST["service"]);
          header('Location: '.RUTA.'historicos.php');
      
      }
    }
  require 'views/agregarHistorico.view.php';
  ?>

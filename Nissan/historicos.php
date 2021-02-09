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

  $codigo = crearTablaHistoricos($bd_config);

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

  require 'views/historicos.view.php';
} elseif($admin['grupo'] == 'usuario') {
  $user = iniciarSession('empleados', $conexion);

  $codigo = crearTablaHistoricos($bd_config);

  $codigoHeader = '<li class="nav-item">
                    <a class="nav-link pl-3 pr-3 mr-5" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active pl-3 pr-3" href="historicos.php">Historicos</a>
                  </li>';
                  require 'views/historicos.view.php';

 }else {                
  header('Location: '.RUTA.'index.php');
}




 ?>

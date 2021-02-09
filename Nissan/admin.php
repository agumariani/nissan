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

  $codigo = crearTabla($bd_config);


  require 'views/admin.view.php';
} else {
  header('Location: '.RUTA.'index.php');
}




 ?>

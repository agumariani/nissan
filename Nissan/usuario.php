<?php session_start();

require 'admin/config.php';
require 'functions.php';

 
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('empleados', $conexion);

if ($admin['grupo'] == 'usuario') {
  // traer el nombre del usuario
  $user = iniciarSession('empleados', $conexion);

  $codigo = crearTablaUsuario($bd_config, $admin['idEmpleado']);


  require 'views/usuario.view.php';
} else {
  header('Location: '.RUTA.'index.php');
}
?>
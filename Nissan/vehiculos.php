<?php session_start();

require 'admin/config.php';
require 'functions.php';

 
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('empleados', $conexion);
$codigo = '';
$codigoModelo = '';
if ($admin['grupo'] == 'administrador') {
  // traer el nombre del usuario
  $user = iniciarSession('empleados', $conexion);

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM vehiculos ');
  $statement->execute();

  $codigo = '<datalist id="dominios">';
  while($fila = $statement->fetch()){
    $codigo .=  '<option value="'.utf8_encode($fila["idVehiculo"]).'">'.utf8_encode($fila["idVehiculo"]).'</option>';
  }
  $codigo .= '</datalist>';

  if(isset($_POST['agregarVehiculo'])){
    $modelo = limpiarDatos($_POST['modelo']);
    $dominio = limpiarDatos($_POST['dominio']);

    $errores = '';

    if (empty($dominio) || empty($modelo)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }else{

        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('SELECT * FROM vehiculos WHERE idvehiculo = :dominio LIMIT 1');
        $statement->execute(array(
            ':dominio' => $dominio
        ));
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li class="error">Este vehiculo ya existe</li>';
        }
    }
    if($errores==''){
      agregarVehiculo($bd_config, $dominio, $modelo);
    }


  }elseif(isset($_POST['modificarVehiculo'])){
    $modelo = limpiarDatos($_POST['modelo']);
    $dominio = limpiarDatos($_POST['dominio']);

    $errores = '';


    if (empty($dominio) || empty($modelo)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }
    if($errores==''){

      modificarVehiculo($bd_config, $dominio, $modelo);
    }

  }elseif(isset($_POST['eliminarVehiculo'])) {
    $dominio = limpiarDatos($_POST['dominio']);

    $errores = '';


    if (empty($dominio)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }
    if($errores==''){
      eliminarVehiculo($bd_config, $dominio);

    }

  }

require 'views/vehiculos.view.php';
} else {
  header('Location: '.RUTA.'index.php');
}

?>
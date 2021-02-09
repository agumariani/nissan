<?php session_start();

require 'admin/config.php';
require 'functions.php';
 
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$user = iniciarSession('empleados', $conexion);
$idusuario= $user['idEmpleado'];

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * FROM vehiculos_empleados WHERE idEmpleado =  '$idusuario' ");
  $statement->execute();

  $codigo = '<datalist id="vehiculos">';
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


    if(isset($_POST["enviar"])){
      $vendedor = $user['idEmpleado'];    
      agregarHistorico($bd_config, $vendedor, $_POST["vehiculo"], $_POST["km"], $_POST["observaciones"], $_POST["service"]);
     /*   
    $dominio = limpiarDatos($_POST['vehiculo']);
    $km= limpiarDatos($_POST['km']);
    $observaciones = limpiarDatos($_POST['observaciones']);
    $service = limpiarDatos($_POST['service']);

    $errores = '';

    // validar los campos de texto
    if (empty($dominio) || empty($modelo) || empty($km) || empty($observaciones) || empty($service)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }
    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO historicos (idVehiculo, idEmpleado, kilometros, observaciones, service) VALUES(:dominio, :vendedor, :km, :observaciones, :service)');
        $statement->execute(
            array(
                ':dominio' => $dominio,
                ':vendedor' => $vendedor,
                ':km' => $km,
                ':observaciones' => $observaciones,
                ':service' => $service
            ) 

        );*/

        //header('Location: '.RUTA.'login.php');

    
  }

  require 'views/agregarHistorico.view.php';
  ?>

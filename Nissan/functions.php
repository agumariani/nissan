<?php

function conexion($bd_config){
  try {
    $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['db_name'],$bd_config['user'],$bd_config['pass']);
    return $conexion;
  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
}

function limpiarDatos($datos){
  $datos = htmlspecialchars($datos);
  $datos = trim($datos);
  $datos = filter_var($datos, FILTER_SANITIZE_STRING);

  return $datos;
}

function iniciarSession($table, $conexion){
  $statement = $conexion->prepare("SELECT * FROM $table WHERE idEmpleado = :usuario");
  $statement->execute([
    ':usuario' => $_SESSION['usuario']
  ]);
  return $statement->fetch(PDO::FETCH_ASSOC);
}

function crearTabla($bd_config){
  
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM vehiculos_empleados ve, vehiculos v, empleados e WHERE ve.idEmpleado = e.idEmpleado AND ve.idVehiculo = v.idVehiculo');
  $statement->execute();

  $codigo = '';  
  while ($fila = $statement->fetch() ) {  
  $codigo .= '<tr>';  
  $codigo .= '<td>'.utf8_encode($fila ["apellido"]). ', ' . utf8_encode($fila ["nombre"]).'</td>';  
  $codigo .= '<td>'.utf8_encode($fila ["modelo"]).'</td>';
  $codigo .= '<td>'.utf8_encode($fila ["dominio"]).'</td>';
  $codigo .= '<td>'.utf8_encode($fila ["fechaAsig"]).'</td>';
  $codigo .= '<td>'.utf8_encode($fila ["fechaDesasig"]).'</td>';   

  $codigo .= '</tr>';
  }
  return $codigo;
}

function asignarVehiculo($bd_config, $vehiculo, $vendedor){
 
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * from vehiculos_empleados WHERE idVehiculo =  '$vehiculo'");
  $statement->execute();
  
  
  if($fila = $statement->fetch() !== false){
    $statement = $conexion->prepare("UPDATE vehiculos_empleados SET fechaDesasig = LOCALTIMESTAMP() WHERE idVehiculo =  '$vehiculo' ");
    $statement->execute();
    
    $statement = $conexion->prepare("INSERT INTO vehiculos_empleados(idVehiculo, idEmpleado) VALUES  ('$vehiculo', '$vendedor'); ");
    $statement->execute();
  }else {
    $statement = $conexion->prepare("INSERT INTO vehiculos_empleados(idVehiculo, idEmpleado) VALUES  ('$vehiculo', '$vendedor'); ");
    $statement->execute();
  }
}

function agregarVehiculo($bd_config, $dominio, $modelo){

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("INSERT INTO vehiculos VALUES  ('$dominio', '$dominio', '$modelo');");
  $statement->execute();
 

}

function eliminarVehiculo($bd_config, $dominio){

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * from vehiculos_empleados WHERE idVehiculo =  '$dominio'");
  $statement->execute();
    if($fila = $statement->fetch() !== false){
    $statement = $conexion->prepare("DELETE FROM vehiculos_empleados WHERE  idVehiculo = '$dominio'");
    $statement->execute();
    }

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("DELETE FROM vehiculos WHERE  idVehiculo = '$dominio'");
  $statement->execute();

  


}

function modificarVehiculo($bd_config, $dominio, $modelo){

    $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * from vehiculos_empleados WHERE idVehiculo =  '$dominio'");
  $statement->execute();
    if($fila = $statement->fetch() !== false){
    $statement = $conexion->prepare("UPDATE vehiculos_empleados SET modelo = '$modelo'  WHERE  idVehiculo = '$dominio'");
    $statement->execute();
    }

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("UPDATE vehiculos SET modelo = '$modelo'  WHERE  idVehiculo = '$dominio'");
  $statement->execute();


}

function crearTablaUsuario($bd_config, $usuario){
  
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * FROM vehiculos_empleados ve, vehiculos v, empleados e WHERE ve.idEmpleado = '$usuario' AND e.idEmpleado = ve.idEmpleado AND ve.idVehiculo = v.idVehiculo");
  $statement->execute();

  $codigo = '';  
  while ($fila = $statement->fetch() ) {  
  $codigo .= '<tr>';  
  $codigo .= '<td>'.utf8_encode($fila ["apellido"]). ', ' . utf8_encode($fila ["nombre"]).'</td>';  
  $codigo .= '<td>'.utf8_encode($fila ["modelo"]).'</td>';
  $codigo .= '<td>'.utf8_encode($fila ["dominio"]).'</td>';
  $codigo .= '<td>'.utf8_encode($fila ["fechaAsig"]).'</td>';
  $codigo .= '<td>'.utf8_encode($fila ["fechaDesasig"]).'</td>';   

  $codigo .= '</tr>';
  }
  return $codigo;
}

function crearTablaHistoricos($bd_config){
  
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("SELECT * FROM vehiculos v, empleados e, historicos h WHERE h.idEmpleado = e.idEmpleado and v.idVehiculo=h.idVehiculo ORDER BY h.fechacarga desc LIMIT 15;");
  $statement->execute();

  $codigo = '';  
  while ($fila = $statement->fetch() ) {  
  $codigo .= '<tr>';  
    $codigo .= '<td>'.utf8_encode($fila ["apellido"]). ', ' . utf8_encode($fila ["nombre"]).'</td>';  
    $codigo .= '<td>'.utf8_encode($fila ["modelo"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila ["dominio"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila ["kilometros"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila ["observaciones"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila ["service"]).'</td>';
    $codigo .= '<td>'.utf8_encode($fila ["fechaCarga"]).'</td>';
    
  $codigo .= '</tr>';
  }
  return $codigo;
}


function agregarHistorico($bd_config, $vendedor, $dominio, $km, $observaciones, $service){

  $dominio = limpiarDatos($dominio);
  $vendedor = limpiarDatos($vendedor);
  $km= limpiarDatos($km);
  $observaciones = limpiarDatos($observaciones);
  $service = limpiarDatos($service);

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("INSERT INTO historicos (idVehiculo, idEmpleado, kilometros, observaciones, service) VALUES('$dominio', '$vendedor', '$km', '$observaciones', '$service');");
  $statement->execute();

}
 ?>

<?php session_start();

require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $password = hash('sha512', $password);
    $nombre= limpiarDatos($_POST['nombre']);
    $apellido = limpiarDatos($_POST['apellido']);
    $dni = limpiarDatos($_POST['dni']);
    $rol = $_POST['rol'];

    $errores = '';

    // validar los campos de texto
    if (empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }else{
        // validacion de que el usuario no exista
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('SELECT * FROM empleados WHERE idEmpleado = :usuario LIMIT 1');
        $statement->execute(array(
            ':usuario' => $usuario
        ));
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li class="error">Este usuario ya existe</li>';
        }
    }

    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO empleados (idEmpleado, contrasenia, grupo, nombre, apellido, documento) VALUES(:usuario, :password, :grupo, :nombre, :apellido, :dni)');
        $statement->execute(
            array(
                ':usuario' => $usuario,
                ':password' => $password,
                ':grupo' => $rol,
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':dni' => $dni
            )    
        );

        header('Location: '.RUTA.'login.php');

    }
}

require 'views/registro.view.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Registrar</title>
</head>
<body class="bg-image">
  <div class="container mt-5 col-6 d-flex flex-column align-items-center">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="col-6 d-flex flex-column">
      <div class="input-group">
        <i class="fa fa-user-o icons" aria-hidden="false"></i>
        <input type="text" name="usuario" placeholder="Usuario" class="form-control">
      </div>

      <div class="input-group">
        <i class="fa fa-lock icons" aria-hidden="false"></i>
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
      </div>

      <div class="input-group">
        <i class="far fa-id-card icons"></i>
        <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        <input type="text" name="apellido" placeholder="Apellido" class="form-control">
        <input type="text" name="dni" placeholder="DNI" class="form-control">
      </div>

      <div class="input-group">
        <select class="form-control" name="rol">
          <option value="">Selecciona un privilegio</option>
          <option value="administrador">Administrador</option>
          <option value="usuario">Usuario</option>
        </select>
      </div>

      <?php if (!empty($errores)): ?>
        <ul>
          <?php echo $errores; ?>
        </ul>
      <?php endif; ?>

      <button type="submit" name="submit" class="btn btn-primary col-3 align-self-center">Registrar</button>
    </form>

    <a href="<?php echo RUTA.'login.php' ?>" class="login-link">¿Ya tienes cuenta?</a>
  </div>
</body>
</html>

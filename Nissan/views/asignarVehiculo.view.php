<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Asignar Vehiculo</title>
  
</head>
<body>
  <div class="header">
    <div class="logo"><a href="index.php"><img src="img\logoNissan.png" alt="logo" width="100"></a></div>

    <ul class="nav nav-tabs justify-content-center">
      <li class="nav-item">
        <a class="nav-link  pl-3 pr-3 mr-5" href="admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pl-3 pr-3 mr-5" href="vehiculos.php">Vehiculos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active pl-3 pr-3 mr-5" href="asignarVehiculo.php">Asignar Vehiculo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pl-3 pr-3" href="historicos.php">Historicos</a>
      </li>
    </ul>

    <div>
      <a href=" <?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
    </div>

  </div>

  <div class="container d-flex flex-column align-items-center">
  <h1 class="text-center">Asignacion de Vehiculo</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="col-7 mt-3 d-flex flex-column">
    <div class="mb-3">
      <label for="" class="mb-2">Vehiculo a asignar: </label>
      <?php 

        echo $codigo;
      ?>
    </div>
    <div>
      <label for="">Vendedor: </label>
      <?php 
    
        echo $codigoVendedor;  

      ?>
    </div>
    <div>
        <?php if (!empty($errores)): ?>
          <?php echo $errores ?>
        <?php endif; ?>
      </div>
    <button type="submit" class="btn btn-secondary mt-3 col-3 align-self-center" name="asignar">Asignar</button>
  </form>

  </div>


</body>
</html>
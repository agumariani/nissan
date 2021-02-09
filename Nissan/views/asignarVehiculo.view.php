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

  <div class="container">
  <h1>Asignacion de Vehiculo</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <label for="">Vehiculo a asignar: </label>
    <input list="vehiculos" name="vehiculo" id="vehiculo" class="form-control">
    <?php 

      echo $codigo;
    ?>

    <!--<input class="form-control" type="text" placeholder="Modelo" readonly  value="<?php echo utf8_encode($fila["modelo"]); ?>">-->

    <label for="">Vendedor: </label>
    <input list="vendedores" name="vendedor" id="vendedor" class="form-control">
    <?php 
    
      echo $codigoVendedor;  

    ?>
    <button type="submit" class="btn btn-secondary mt-3" name="asignar">Asignar</button>
  </form>

  </div>


</body>
</html>
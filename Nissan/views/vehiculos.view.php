<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css\bootstrap.min.css">
  <script src="js\jquery-3.5.1.min.js"></script>
  <script src="js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Vehiculos</title>

  <script>
/*
  $(document).ready(function(){
    $("#agregarVehiculo").click(function(){
      $("#fdsAgregar").toggle();
    });
    $("#modificarVehiculo").click(function(){
      $("#fdsModificar").toggle();
    });
    $("#eliminarVehiculo").click(function(){
      $("#fdsEliminar").toggle();
    });
      
  });*/

  

  </script>
</head>
<body>
<div class="header">
    <div class="logo"><a href="index.php"><img src="img\logoNissan.png" alt="logo" width="100"></a></div>

    <ul class="nav nav-tabs justify-content-center">
      <li class="nav-item">
        <a class="nav-link  pl-3 pr-3 mr-5" href="admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active pl-3 pr-3 mr-5" href="vehiculos.php">Vehiculos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pl-3 pr-3 mr-5" href="asignarVehiculo.php">Asignar vehiculo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pl-3 pr-3" href="historicos.php">Historicos</a>
      </li>
    </ul>

    <div>
      <a href=" <?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
    </div>

  </div>

  <div class="container mt-3 d-flex flex-column  align-items-center justify-content-between" >
    

      
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="frmAgregar" style="width: 60%" class="d-flex flex-column">
    

      <a data-bs-toggle="collapse" href="#fdsAgregar" role="button" aria-expanded="false" aria-controls="fdsAgregar"></a>
      <legend id="agregarVehiculo">Agregar Vehiculo</legend>
      <fieldset id="fdsAgregar" class="d-flex flex-column">
        <label for="">Dominio</label>
        <input type="text" class="form-control" placeholder="Dominio" name="dominio">
        <label for="">Modelo: </label>
        <input type="text" class="form-control" placeholder="Modelo" name="modelo">
        <div>
        <?php if (!empty($errores)): ?>
          <?php echo $errores ?>
        <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-outline-primary align-self-center mt-3 mb-3" name="agregarVehiculo" id="btnAgregar" style="width: 50%" >Agregar Vehiculo</button>
      </fieldset>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="frmModificar" style="width: 60%" class="d-flex flex-column">
      
      <legend id="modificarVehiculo">Modificar Vehiculo</legend>
      <fieldset id="fdsModificar" class="hide d-flex flex-column">

        <label for="dominios">Dominio:</label>
          
            <?php 

              echo $codigo;

            ?>
        <label for="">Modelo nuevo: </label>
        <input type="text" class="form-control" placeholder="Modelo" name="modelo">

        <div>
        <?php if (!empty($errores)): ?>
          <?php echo $errores ?>
        <?php endif; ?>
        </div>
      <button type="submit" class="legend btn btn-outline-info align-self-center mt-3 mb-3" name="modificarVehiculo" id="btnModificar" style="width: 50%">Modificar Vehiculo</button>
      </fieldset>
    </form>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="frmEliminar" style="width: 60%" class="d-flex flex-column">
      
      <legend id="eliminarVehiculo">Eliminar Vehiculo</legend>
      <fieldset id="fdsEliminar" class="hide d-flex flex-column">

        <div class="form-group">
          <label for="dominios">Dominio:</label>
          
            <?php 

              echo $codigo;

            ?>
            
          </div>
          <div>
        <?php if (!empty($errores)): ?>
          <?php echo $errores ?>
        <?php endif; ?>
        </div>
        <button type="submit" class="legend btn btn-outline-danger align-self-center" name="eliminarVehiculo" id="btnEliminar" style="width: 50%">Eliminar Vehiculo</button>
        </fieldset>
    </form>
  </div>
  
  
  


</body>
</html>
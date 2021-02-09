<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css\bootstrap.min.css">
  <script src="js\bootstrap.min.js"></script>
  <script src="js\jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Vehiculos</title>

  <script>
 function funcionAgregar() {
    alert("<p class="error">Vehiculo agregado con exito</p>")
  }
  
  function funcionModificar() {
    alert("<p class="error">Vehiculo modificado con exito</p>")
  }
  
  function funcionEliminar() {
    alert("<p class="error">Vehiculo eliminado con exito</p>")
  }

  /*$(document).ready(function(){
      function hide(arg){
      switch (arg){
        case (btnAgregar):
          $('#frmAgregar').removeClass("hide");
          $('#frmModificar').hide();
          $('#frmEliminar').hide();
          break;
        case btnModificar:
          $('#frmAgregar').hide();
          $('#frmModificar').show();
          $('#frmEliminar').hide();         
          break;
        case btnEliminar:
          $('#frmAgregar').hide();
          $('#frmModificar').hide();
          $('#frmEliminar').show();
          break;

      }
    });*/
   /* $('#btnAgregar').click(function () {
    $('#frmAgregar').slideToggle();
    $('#frmAgregar').toggleClass('hide');

    if ($('#frmAgregar').hasClass('hide')) {
        $('#frmModificar').addClass();
    }
    else {
      $('div p').html('Goobye stackoverflow comunity');
    }

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
    
      <fieldset id="fdsAgregar">
        <legend>Agregar Vehiculo</legend>
        <label for="">Dominio</label>
        <input type="text" class="form-control" placeholder="Dominio" name="dominio">
        <label for="">Modelo: </label>
        <input type="text" class="form-control" placeholder="Modelo" name="modelo">
      </fieldset>
      <button type="submit" class="legend btn btn-outline-primary align-self-center mt-3 mb-3" name="agregarVehiculo" id="btnAgregar" style="width: 50%" onclick="funcionAgregar()">Agregar Vehiculo</button>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="frmModificar" style="width: 60%" class="d-flex flex-column">
      
      <fieldset id="fdsModificar " >
      <legend>Modificar Vehiculo</legend>

        <label for="dominios">Dominio:</label>
          <input list="dominios" type="text" class="form-control" name="dominio" id="" placeholder="Dominio">
          
            <?php 

              echo $codigo;

            ?>
        <label for="">Modelo nuevo: </label>
        <input type="text" class="form-control" placeholder="Modelo" name="modelo">
      </fieldset>
      <button type="submit" class="legend btn btn-outline-info align-self-center mt-3 mb-3" name="modificarVehiculo" id="btnModificar" style="width: 50%" onclick="funcionModificar()">Modificar Vehiculo</button>
    </form>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="frmEliminar" style="width: 60%" class="d-flex flex-column">
      
      <fieldset id="fdsEliminar " >
      <legend>Eliminar Vehiculo</legend>

        <div class="form-group">
          <label for="dominios">Dominio:</label>
          <input list="dominios" type="text" class="form-control" name="dominio" id="" placeholder="Dominio">
          
            <?php 

              echo $codigo;

            ?>
            
          </div>
          
        </fieldset>
        <button type="submit" class="legend btn btn-outline-danger align-self-center" name="eliminarVehiculo" id="btnEliminar" style="width: 50%" onclick="funcionEliminar()">Eliminar Vehiculo</button>
    </form>
  </div>
  
  
  


</body>
</html>
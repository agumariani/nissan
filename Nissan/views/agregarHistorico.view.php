<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <title>Cargar Informe</title>
    <script src="Nissan\js\jquery-3.5.1.min.js"></script>
      
</head>
<body>
  <div class="header">
    <div class="logo"><a href="index.php"><img src="img\logoNissan.png" alt="logo" width="100"></a></div>

    <ul class="nav nav-tabs justify-content-center">
    <?php
        echo $codigoHeader ;
      ?>
    </ul>

    <div>
      <a href=" <?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
    </div>
  </div >


    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="form" class="mt-5">
      <fieldset class="container d-flex flex-column col-8">
        <div class=" d-flex justify-content-center align-items-baseline">
          <label for="vehiculos" class="col-5">Vehiculo: </label>

            <?php 
              echo $codigo;
            ?>
            <div id="modelo" class="col-2">
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-baseline mt-3">
          <label for="KM" class="col-5">Kilometros:</label> 
          <input type="text" id="KM" name="km" class="form-control col-4" placeholder="Kilometros">
        </div>
        <div class="d-flex justify-content-center align-items-baseline mt-3">

          <label for="observaciones" class="col-5">Observaciones:</label> 
          <input type="text" id="observaciones" name="observaciones" class="form-control col-4" placeholder="Observaciones">
        </div>
        <div class="d-flex justify-content-center align-items-baseline mt-3">
          <label for="service" class="col-5">Ultimo Service:</label> 
          <input type="text" id="service" name="service" class="form-control col-4" placeholder="Ultimo service realizado">

        </div>

        <div>
        <?php if (!empty($errores)): ?>
          <?php echo $errores ?>
        <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary align-self-center mt-3" name="enviar" style="width:30%">Agregar</button>
      </fieldset>

    </form>

    <footer>    
    </footer>

  </body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

		recargarLista();

		$('#vehiculos').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>",
			data:"Dominio=" + $('#vehiculos').val(),
			success:function(r){
				$('#modelo').html(r);
			}
		});
	}
</script>
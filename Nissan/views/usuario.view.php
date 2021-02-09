<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Vendedores</title>
</head>
<body>
  <div class="header">
    <div class="logo"><a href="index.php"><img src="img\logoNissan.png" alt="logo" width="100"></a></div>

    <ul class="nav nav-tabs justify-content-center">
      <li class="nav-item">
        <a class="nav-link active pl-3 pr-3 mr-5" href="admin.php">Home</a>
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
            <h2>Bienvenido <?php echo $user['nombre'] ?></h2>

    <table class="table table-striped table-bordered mt-3 text-center">
      <h3 class="text-center">Tus vehiculos asignados</h1>
    <thead>
      <tr>
        <th>Vendedor</th>
        <th>Vehiculo</th>
        <th>Dominio</th>
        <th>Fecha Asignacion</th>
        <th>Fecha Desasignacion</th>
      </tr>
    </thead>
      <?php 

        echo $codigo;

      ?>

    </table> 
  </div>


</body>
</html>
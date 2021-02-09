<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <title>Cargar Informe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
      //Con esta función creo el nuevo objeto AJAX
      function getXMLHTTPRequest() {
      try {
      req = new XMLHttpRequest();
      } catch(errl) {
        try {
        req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
          try {
          req = new ActiveXObject("Microsoft.XMLHTTP");
          } catch (err3) {
            req = false;
          }
        }
      }
      return req;
      }
        
      //Este es el método que ocupo yo para crear un objeto AJAX (más arriba). Puedes
      //usar el método que quieras, o una de las librerias que hay en este foro.
      var oXML = getXMLHTTPRequest();

      //Establece el controlador de AJAX
      function procesar(valor, texto){
          var valor = document.form.vehiculo.value;
          var url = "auxiliar.php?numero=" + valor;
          oXML.open("GET", url, true);
          oXML.onreadystatechange = respuestaAjax;
          oXML.send(null);
      }


      function respuestaAjax() {
      if (oXML.readyState == 4) {
      if (oXML.status == 200) {
        document.form.modelo.value = oXML.responseText;
        }
      }
      }
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
        <a class="nav-link pl-3 pr-3 mr-5" href="vehiculos.php">Vehiculos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link pl-3 pr-3 mr-5" href="asignarVehiculo.php">Asignar Vehiculo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active pl-3 pr-3" href="historicos.php">Historicos</a>
      </li>
    </ul>

    <div>
      <a href=" <?php echo RUTA.'close.php' ?>">Cerrar Sesion</a>
    </div>
  </div >


    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="form" class="mt-5">
      <fieldset class="container d-flex flex-column">
        <div class="m-2 d-flex justify-content-lg-around">
          <label for="vehiculo" class="pt-2">Vehiculo: </label>
            <input list="vehiculos" name="vehiculo" id="vehiculo" class="form-control" style="width:35%" >
            <?php 

              echo $codigo;
            ?>
        </div>

        <div class="d-flex justify-content-lg-around  mt-3">
          <label for="KM" class="mr-5">Km:</label> 
          <input type="text" id="KM" name="km" class="form-control" style="width:60%">
        </div>
        <div class="d-flex justify-content-around mt-3">

          <label for="observaciones">Observaciones:</label> 
          <input type="text" id="observaciones" name="observaciones" class="form-control" style="width:60%" >
        </div>
        <div class="d-flex justify-content-lg-around mt-3">
          <label for="service">Ultimo Service:</label> 
          <input type="text" id="service" name="service" class="form-control" style="width:60%">

        </div>


        <button type="submit" class="btn btn-primary align-self-center mt-3" name="enviar" style="width:30%">Agregar</button>
      </fieldset>

    </form>

    <footer>    
    </footer>

  </body>
</html>

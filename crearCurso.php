<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
}else{
  define('USER', 'root');
  $passwordAcceso = include 'ControlAcceso.php';
  define('PASSWORD', $passwordAcceso);
  define('HOST', 'localhost');
  define('DATABASE', 'CreaticaUnlimited');
  try {
      $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }
  $sql ="SELECT * FROM AREA;";
  $resultado = $connection->query($sql);
  
}

 ?>
 <!DOCTYPE html>

 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Creatica Unlimited</title>


   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="https://kit.fontawesome.com/e51fb510f5.js" crossorigin="anonymous"></script>

 </head>

 <body>


  <?php include("navAdministrador.html"); ?>

  <section id="contact" class="section-padding" style="margin-top:150px;">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Curso Nuevo </h2>
          <h3 style="color: red;"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?> </h3>
          <hr class="bottom-line">
        </div>
        <form action="guardarCurso.php" method="POST" role="form" class="contactForm">
          <div class="col-md-6 col-sm-6 col-xs-12 left">
            <div class="form-group">
                <label>Nombre</label></br>
              <input type="text" name="nombre" class="form-control form" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>"  minlength="5" placeholder="Nombre" required oninvalid="setCustomValidity('Por favor escriba un nombre con mas de 5 caracteres')"
                     oninput="setCustomValidity('')" />
              <div class="validation"></div>
            </div>

            <div class="form-group">
              <label>Area</label></br>
              <select name="area">
                <?php foreach ($resultado as $fila): ?>
                  <option value="<?php echo $fila['nombre']; ?>" <?php if (isset($_GET['area'])) {
                    if ($fila['nombre']==$_GET['area']) {
                      echo "selected";
                    }
                  }  ?>><?php echo $fila['nombre'];  ?> </option>

                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 right">
            <div class="form-group">
              <label>Descripcion</label></br>
              <textarea class="form-control" name="descripcion"  rows="8" required oninvalid="setCustomValidity('Por favor ingrese la descripcion')"
                     oninput="setCustomValidity('')" placeholder="Descripcion"><?php echo isset($_GET['descripcion']) ? $_GET['descripcion'] : ''; ?></textarea>
              <div class="validation"></div>
            </div>
          </div>

          <div class="col-xs-12">

            <button type="submit" class="btn btn-green btn-block btn-flat"><i class="far fa-plus-square"></i> Crear</button>
          </div>
        </form>

      </div>
    </div>
  </section>

   <script src="js/jquery.min.js"></script>
   <script src="js/jquery.easing.min.js"></script>
   <script src="js/bootstrap.min.js"></script>



 </body>

 </html>

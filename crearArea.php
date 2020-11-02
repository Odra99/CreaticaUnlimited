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
  $cont = 1;
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
          <h2>Area Nueva </h2>
          <h3 style="color: red;"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?> </h3>
          <hr class="bottom-line">
        </div>
    <table class="table">
   <thead class="thead-light">
     <tr>
       <th scope="col">#</th>
       <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
     </tr>
   </thead>
   <tbody>
     <?php foreach ($resultado as $fila): ?>
       <form action="Backend/administrarArea.php" method="post">
        <tr>
          <td><?php echo $cont; $cont++; ?></td>
          <td><?php echo $fila['nombre'] ?></td>
          <td>
              <input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>"/>
              <input type="submit" name="Editar" value="Editar" class="btn btn-sm btn-warning"/>
              <input type="submit" value="Borrar" name="Borrar" class="btn btn-sm btn-warning"/>

          </td>

        </tr>
        </form>
      <?php endforeach; ?>

   </tbody>
 </table>
 <form action="Backend/administrarArea.php" method="post">
   <div class="form-group">
       <label>Nombre:</label></br>
     <input type="text" name="nombre" class="form-control form" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>"  minlength="5" placeholder="Nombre" required oninvalid="setCustomValidity('Por favor escriba un nombre con mas de 5 caracteres')"
            oninput="setCustomValidity('')" />
  <input type="hidden" name="nombreAntiguo" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>"/>
       <input type="submit" name="<?php echo $_GET['accion']  ?>" value="<?php echo $_GET['accion']  ?>" class="btn btn-sm btn-warning"/>
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

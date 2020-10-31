<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
}else{
  define('USER', 'root');
  define('PASSWORD', 'Inegap11');
  define('HOST', 'localhost');
  define('DATABASE', 'CreaticaUnlimited');
  try {
      $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
<<<<<<< HEAD
=======

>>>>>>> Jhony
  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }
  $sql ="SELECT * FROM AREA;";
<<<<<<< HEAD
=======
  $cont = 1;
>>>>>>> Jhony
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
<<<<<<< HEAD
        <table class="table">
=======
    <table class="table">
>>>>>>> Jhony
   <thead class="thead-light">
     <tr>
       <th scope="col">#</th>
       <th scope="col">Nombre</th>
<<<<<<< HEAD
=======
        <th scope="col">Acciones</th>
>>>>>>> Jhony
     </tr>
   </thead>
   <tbody>
     <?php foreach ($resultado as $fila): ?>
<<<<<<< HEAD
       <form action="Backend/editarHorario.php" method="post">
=======
       <form action="Backend/administrarArea.php" method="post">
>>>>>>> Jhony
        <tr>
          <td><?php echo $cont; $cont++; ?></td>
          <td><?php echo $fila['nombre'] ?></td>
          <td>
<<<<<<< HEAD
            <input type="hidden" name="nombreMaestro" value="<?php echo $fila['nombreMaestro'] ?>">
<input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>">
              <input type="hidden" name="estado" value="<?php echo $fila['estado'] ?>">
              <input type="hidden" name="codigo" value="<?php echo $fila['codigoHorario'] ?>">
              <input type="submit" name="editar" value="Editar" class="btn btn-sm btn-warning">
              <input type="submit" value="Borrar" name="borrar" class="btn btn-sm btn-warning">
=======
              <input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>"/>
              <input type="submit" name="Editar" value="Editar" class="btn btn-sm btn-warning"/>
              <input type="submit" value="Borrar" name="Borrar" class="btn btn-sm btn-warning"/>
>>>>>>> Jhony

          </td>

        </tr>
        </form>
      <?php endforeach; ?>

   </tbody>
 </table>
<<<<<<< HEAD
=======
 <form action="Backend/administrarArea.php" method="post">
   <div class="form-group">
       <label>Nombre:</label></br>
     <input type="text" name="nombre" class="form-control form" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>"  minlength="5" placeholder="Nombre" required oninvalid="setCustomValidity('Por favor escriba un nombre con mas de 5 caracteres')"
            oninput="setCustomValidity('')" />
  <input type="hidden" name="nombreAntiguo" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>"/>
       <input type="submit" name="<?php echo $_GET['accion']  ?>" value="<?php echo $_GET['accion']  ?>" class="btn btn-sm btn-warning"/>
   </div>
 </form>
>>>>>>> Jhony

      </div>
    </div>
  </section>

   <script src="js/jquery.min.js"></script>
   <script src="js/jquery.easing.min.js"></script>
   <script src="js/bootstrap.min.js"></script>



 </body>

 </html>

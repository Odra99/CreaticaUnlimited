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
  $sql ="SELECT h.*, c.nombre, concat(p.nombre , ' ',p.apellido)as nombreMaestro FROM HORARIO as h INNER JOIN CURSO as c on h.curso=c.nombre INNER JOIN PERFIL as p on p.usuario = h.usuarioMaestro ";
  if(isset($_POST['nombre'])){
    $sql=" SELECT h.*, c.nombre, concat(p.nombre , ' ',p.apellido)as nombreMaestro FROM HORARIO as h INNER JOIN CURSO as c on h.curso=c.nombre INNER JOIN PERFIL as p on p.usuario = h.usuarioMaestro
where c.nombre LIKE '%".$_POST['nombre']."%'";
  }
  $cont=1;
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
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
  <script src="https://kit.fontawesome.com/e51fb510f5.js" crossorigin="anonymous"></script>
</head>
<body>
 <?php include("navAdministrador.html"); ?>
 <section id="contact" class="section-padding" style="margin-top:150px;">
   <div class="container">

     <div class="row">
       <div class="header-section text-center">
         <h2>Modificar Horario </h2>
         <h3 style="color: red;"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?></h3>
         <hr class="bottom-line">
       </div>
       <form action="modificarHorario.php" class="col-md-12" style="text-align: center;" method="POST" >
        <label>Curso:</label><br><input type='text' name='nombre' value='<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>' class='auto'>
          <button type="submit" class="btn btn-green"><i class="fas fa-search"></i>   Buscar </button>
          <br>
            <br>
              <br>
       </form>

          <table class="table">
     <thead class="thead-light">
       <tr>
         <th scope="col">#</th>
         <th scope="col">Curso</th>
         <th scope="col">Maestro</th>
         <th scope="col">Fecha Inicio</th>
         <th scope="col">Fecha Fin</th>
         <th scope="col">Clases</th>
         <th scope="col">Acciones</th>
       </tr>
     </thead>
     <tbody>
       <?php foreach ($resultado as $fila): ?>
         <form action="Backend/editarHorario.php" method="post">
          <tr>
            <td><?php echo $cont; $cont++; ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['nombreMaestro'] ?></td>
            <td><?php echo $fila['fechaInicio'] ?></td>
            <td><?php echo $fila['fechaFin'] ?></td>
            <td><?php echo $fila['duracion'] ?></td>
            <td>
              <input type="hidden" name="nombreMaestro" value="<?php echo $fila['nombreMaestro'] ?>">
              <input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>">
                <input type="hidden" name="codigo" value="<?php echo $fila['codigo'] ?>">
                <input type="submit" name="editar" value="Editar" class="btn btn-sm btn-warning">
                <input type="submit" value="Borrar" name="borrar" class="btn btn-sm btn-warning">

            </td>

          </tr>
          </form>
        <?php endforeach; ?>

     </tbody>
   </table>



     </div>
   </div>
 </section>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
  <script type="text/javascript">
  $(function() {
      $(".auto").autocomplete({
          source: "curso.php",
          minLength: 1
      });
  });
  </script>
</body>
</html>

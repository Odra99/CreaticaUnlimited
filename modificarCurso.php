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

  if(isset($_POST['nombre'])){
    $sql ="SELECT * FROM CURSO WHERE nombre=";
    $sql.="'".$_POST['nombre']."'";

    $resultado2 = $connection->query($sql);
     foreach($resultado2 as $fila2) $curso=$fila2;
  }
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
         <h2>Modificar curso </h2>
         <h3 style="color: red;"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?></h3>
         <hr class="bottom-line">
       </div>
       <form action="modificarCurso.php" class="col-md-12" style="text-align: center;" method="POST" >
        <label>Curso:</label><br><input type='text' name='nombre' value='<?php echo isset($curso['nombre']) ? $curso['nombre'] : ''; ?>' class='auto'>
          <button type="submit" class="btn btn-green"><i class="fas fa-search"></i>   Buscar </button>
          <br>
            <br>
              <br>
       </form>
        <form action="Backend/modificarCurso.php"  method="POST" >
       <div class="col-md-6 col-sm-6 col-xs-12 left">

         <div class="form-group">
           <input type="text" name="nombreAntiguo" value="<?php echo isset($curso['nombre']) ? $curso['nombre'] : ''; ?>" hidden/>
           <label>Nombre</label><br><input type="text" name="nombre" value="<?php echo isset($curso['nombre']) ? $curso['nombre'] : ''; ?>" required minlength="5"
           oninvalid="setCustomValidity('Por favor ingrese el nombre')"
                  oninput="setCustomValidity('')" placeholder="Nombre" />
           <br><label>Area</label></br>
           <select name="area">
             <?php foreach ($resultado as $fila): ?>
               <option value="<?php echo $fila['nombre']; ?>" <?php if (isset($curso['area'])) {
                 if ($fila['nombre']==$curso['area']) {
                   echo "selected";
                 }
               }  ?>><?php echo $fila['nombre'];  ?> </option>

             <?php endforeach; ?>
           </select>
         </div>
         
       </div>
       <div class="col-md-6 col-sm-6 col-xs-12 right">
         <div class="form-group">
           <textarea class="form-control" name="descripcion"  rows="8" required oninvalid="setCustomValidity('Por favor ingrese la descripcion')"
                  oninput="setCustomValidity('')" placeholder="Descripcion"><?php echo isset($curso['descripcion']) ? $curso['descripcion'] : ''; ?></textarea>
         </div>
          <button type="submit" class="btn btn-green btn-flat"><i class="fas fa-save"></i> Modificar</button>
       </div>



       </form>
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

<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
}else{
  $Year = date("Y");
  $fechaInicio = date("Y-m-d");
  $fechaFin = $Year."-12-31";
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
         <h2>Agregar Horario </h2>
         <h3 style="color: red;"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?></h3>
         <hr class="bottom-line">
       </div>
       <form action="Backend/guardarHorario.php" method="POST" role="form" class="contactForm">
         <div class="col-md-5 col-sm-5 col-xs-12 left">
          <p><label>Curso:</label><br><input type='text' name='nombre' value='' class='auto'></p>
           <div class="form-group">
             <label><i class="far fa-calendar-alt"></i> Fecha Inicio</label></br>
            <input type="date" min="<?php echo $fechaInicio ?>" max="<?php echo $fechaFin?>" />
           </div>
           <div class="form-group">
             <label><i class="far fa-calendar-alt"></i> Fecha Fin</label></br>
            <input type="date" min="<?php echo $fechaInicio?>" max="<?php echo $fechaFin?>" />
           </div>
         </div>
         <div class="col-md-7 col-sm-7 col-xs-12 right">
           <p><label><i class="fas fa-chalkboard-teacher"></i> Maestro:</label><br><input type='text' name='nombreMaestro' value='' class='maestro'></p>
           <div class="form-group" style="width: 25%;" >
               <label>Dias </label></br>
               <fieldset>
                 <input type="checkbox" name="lunes"  value="lunes" /><label for="lunes">.  Lunes</label><br/>
                 <input type="checkbox" name="martes"  value="martes"  /><label for="martes">.  Martes</label><br />
                 <input type="checkbox" name="miercoles"  value="miercoles" /><label for="miercoles">.  Miercoles</label><br />
                 <input type="checkbox" name="jueves"  value="jueves" /><label for="jueves">. Jueves</label><br />
                 <input type="checkbox" name="viernes"  value="viernes" /><label for="viernes">. Viernes</label><br />
                 <input type="checkbox" name="sabado"  value="sabado" /><label for="sabado">. Sabado</label><br />
                 <input type="checkbox" name="domingo"  value="domingo" /><label for="domingo">. Domingo</label><br />
               </fieldset>
           </div>
         </div>
         <div class="col-md-12 align-items-center">
           <button type="submit" class="btn btn-green col-lg-4" style="margin-left:35%;"><i class="far fa-plus-square"></i> Crear</button>
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

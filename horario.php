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
     <div class="row ">
       <div class="header-section text-center">
         <h2>Agregar Horario </h2>
         <h3 style="color: red;"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?></h3>
         <hr class="bottom-line">
       </div>
       <form action="Backend/guardarHorario.php" method="POST" role="form" class="contactForm col-md-12">
         <div class="col-md-5 col-sm-5 col-xs-12 left" style="padding-left: 20%;">
          <p><label>Curso:</label><br><input  required type='text' name='nombre' value='' class='auto'></p>
      
           <div class="form-group">
             <label><i class="far fa-calendar-alt"></i> Fecha Inicio</label></br>
            <input type="date" name="fechaInicio"  required/>
           </div>
           <div class="form-group">
           <label><i class="far fa-calendar-alt"></i> Fecha Fin</label></br>
          <input type="date" name="fechaFin"  required />
         </div>
         <div class="form-group has-feedback">
           <input class="form-control" placeholder="año" name="year" type="number" maxlength="4" autocomplete="on" required />
         </div>
         <div class="form-group" style="width: 75%;" >
             <label>Costo Q. </label></br>
           <input type="number" step="0.01" name="costo" min="0" class="form-control form" required oninvalid="setCustomValidity('Por favor defina el costo del curso')"
                  oninput="setCustomValidity('')" />
         </div>
         </div>
         <div class="col-md-7 col-sm-7  right " style="padding-left: 15%;">
           <p><label><i class="fas fa-user"></i> Usuario:</label><br><input style="width:75%;" required type='text' onchange="myfuncion()" id="usuario" name='usuario'  value='' class='usuario'></p>
            <p><label><i class="fas fa-chalkboard-teacher"></i> Maestro:</label><br><input style="width:75%;" required type='text'  id="nombreMaestro"   readonly></p>
            <div class="form-group">
              <label><i class="fas fa-chalkboard"></i> Clases </label></br>
             <input type="number" name="clases" min="1" required />
            </div>
             <label>Seleccione los dias de clase: </label></br>
            <label for="exampleInputPassword1">Lunes</label>
            <input  name="L"   type="checkbox"    value="1" />
            <label for="exampleInputPassword1">Martes</label>
            <input  name="M"   type="checkbox"   value="1" />
            <label for="exampleInputPassword1">Miercoles</label>
            <input   name="MM"   type="checkbox"   value="1"/>
            <label for="exampleInputPassword1">Jueves</label>
            <input   name="J"   type="checkbox"   value="1"/>
            <label for="exampleInputPassword1">Viernes</label>
            <input   name="V"   type="checkbox"   value="1" />
            <label for="exampleInputPassword1">Sabado</label>
            <input   name="S"   type="checkbox"   value="1"/>
            <label for="exampleInputPassword1">Domingo</label>
            <input   name="D"   type="checkbox"   value="1"/>
         </div>
         <div class="col-md-12 align-items-center">
           <button type="submit" class="btn btn-green col-lg-4" style="margin-left:35%;"><i class="far fa-plus-square"></i> Agregar</button>
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
  $(function() {
      $(".usuario").autocomplete({
          source: "maestroUsuario.php",
          minLength: 1
      });
  });
  function myfuncion(){
       var xmlhttp = new XMLHttpRequest();
     var dbParam =   document.getElementById("usuario").value;
       xmlhttp.onreadystatechange = function() {
           var myObj = JSON.parse(this.responseText);
           document.getElementById("nombreMaestro").value = myObj.name;
       };
       xmlhttp.open("GET", "maestroNombre.php?term="+dbParam, false);
       xmlhttp.send();
  }
  </script>
</body>
</html>

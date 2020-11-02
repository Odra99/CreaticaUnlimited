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

      $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
      $connection->set_charset("utf8");

  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }

  if(isset($_POST['usuario'])){
    $sql ="SELECT * FROM PERFIL WHERE usuario=";
    $sql.="'".$_POST['usuario']."'";

    $resultado2 = $connection->query($sql);
     foreach($resultado2 as $fila2) $usuario=$fila2;
     $sql = "SELECT * FROM MAESTRO WHERE usuario=";
       $sql.="'".$_POST['usuario']."'";
       $count = 0;
       $resultado = $connection->query($sql);
       $checked = "";
        foreach($resultado as $fila){$fila2 = $fila; $count++;}
        if($count==1){
          $checked = "checked";
          $estado = $fila2['estado'];
        }
  }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
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
         <h2>Modificar Usuario </h2>
         <h3 style="color: red;"> <?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?></h3>
         <hr class="bottom-line">
       </div>
       <form action="modificarUsuario.php" class="col-md-12" style="text-align: center;" method="POST" >
        <label>Usuario:</label><br><input type='text' name='usuario' value='<?php echo isset($usuario['usuario']) ? $usuario['usuario'] : ''; ?>' class='auto'>
          <button type="submit" class="btn btn-green"><i class="fas fa-search"></i>   Buscar </button>
          <br>
            <br>
              <br>
       </form>
        <form action="Backend/guardarPerfil.php"  method="POST" >
       <div class="col-md-12 col-sm-6 col-xs-12 left">
           <input type="text" value="../Administrador.php" name="direccion" hidden/>
         <h6 class="heading-small text-muted mb-4">Informacion de usuario</h6>
         <div class="pl-lg-4">
           <div class="row">
             <div class="col-lg-6">
               <div class="form-group focused">
                 <label class="form-control-label" for="input-username">Usuario</label>
                     <input type="text" name="usuarioAntiguo"  hidden value="<?php echo $usuario['usuario']  ?>" />
                 <input type="text" name="usuario" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $usuario['usuario']  ?>" />
               </div>
             </div>
             <div class="col-lg-6">
               <div class="form-group">
                 <label class="form-control-label" for="input-email">Correo</label>
                 <input type="email" name="correo" class="form-control form-control-alternative" placeholder="jesse@example.com"  value="<?php echo $usuario['correoElectronico']  ?>"/>
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-lg-4">
               <div class="form-group focused">
                 <label class="form-control-label" for="input-first-name">Nombre</label>
                 <input type="text" name="nombre" class="form-control form-control-alternative" placeholder="Nombre"  value="<?php echo $usuario['nombre']  ?>"/>
               </div>
             </div>
             <div class="col-lg-4">
               <div class="form-group focused">
                 <label class="form-control-label" for="input-last-name">Apellido</label>
                 <input type="text" name="apellido" class="form-control form-control-alternative" placeholder="Apellido"  value="<?php echo $usuario['apellido']  ?>"/>
               </div>
             </div>
             <div class="col-lg-4">
               <div class="form-group focused">
                 <label class="form-control-label" for="input-last-name">contraseña</label>
                 <input type="password" name="password" class="form-control form-control-alternative" placeholder="******"  value="<?php echo $usuario['password']  ?>" />
                  <input type="text" name="descripcion"  value="<?php echo $usuario['descripcion']  ?>" hidden />
                    <input type="text" name="telefono"  value="<?php echo $usuario['telefono']  ?>" hidden />
               </div>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-lg-6">
             <div class="form-group focused">
               <label class="form-control-label" for="input-first-name">Maestro   </label>
                <input type="checkbox" name="maestro"  value="maestro" <?php echo $checked ?>/>
                <label>Disponible</label>
                <select name="estado">

                    <option value="PRESENTE" <?php  if($estado=='PRESENTE'){ echo "selected";}?>> Presente</option>
                        <option value="AUSENTE" <?php  if($estado=='AUSENTE'){ echo "selected";}?>>Ausente  </option>


                </select>

             </div>
           </div>
           <div class="col-lg-6">
             <div class="form-group focused">
               <button type="submit" class="btn btn-green"><i class="fas fa-save"></i>    Modificar </button>

             </div>
             <div class="form-group focused">
               <button type="submit" name="eliminar"class="btn btn-green"><i class="fas fa-eraser"></i>    Eliminar </button>

             </div>
           </div>

         </div>
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
          source: "usuarioSearch.php",
          minLength: 1
      });
  });
  </script>
</body>
</html>

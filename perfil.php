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
  $sql ="SELECT * FROM PERFIL";
  $sql.=" WHERE usuario = '".$_SESSION['user']."'";
  $resultado = $connection->query($sql);
   foreach($resultado as $fila) $usuario=$fila;
   $maestro="ESTUDIANTE";

   $sql ="SELECT * FROM MAESTRO";
   $sql.=" WHERE usuario = '".$_SESSION['user']."'";
   $resultado = $connection->query($sql);
    foreach($resultado as $fila) $maestro="MAESTRO";
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
  <link rel="stylesheet" type="text/css" href="css/estiloPerfil.css">
<script src="https://kit.fontawesome.com/e51fb510f5.js" crossorigin="anonymous"></script>

</head>

<body>
<?php
  if($maestro=='MAESTRO'){
     include("navMaestro.html");
  }else{
     include("navEstudiante.html");
  }

 ?>
  <div style="margin-top: 250px;">
    <div class="container-fluid mt--7" >
      <div class="row">
        <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="img/perfil.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
              <div class="card-body pt-0 pt-md-4" style="margin-top:50px;">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
<br>
                  </div>
                </div>
              </div>
              <div class="text-center"><br><br>
                <h3>
                  <?php echo $usuario['nombre'] ?>  <?php echo $usuario['apellido'] ?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $maestro ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 order-xl-2">
            <form action="Backend/guardarPerfil.php" method="post">
              <input type="text" value="../perfil.php" name="direccion" hidden/>
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Mi cuenta</h3>
                </div>
                <div class="col-4 text-right">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
              </div>
            </div>
            <div class="card-body">

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
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">

                <h6 class="heading-small text-muted mb-4">Informacion de contacto</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Telefono</label>
                        <input name="telefono" class="form-control form-control-alternative" placeholder="Home Address"  value="<?php echo $usuario['telefono']  ?>" type="text"/>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4">

                <h6 class="heading-small text-muted mb-4">Acerca de mi</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Acerca de mi </label>
                    <textarea  name="descripcion"rows="4" class="form-control form-control-alternative" placeholder="Descripcion"> <?php echo $usuario['descripcion']  ?></textarea>
                  </div>
                </div>

            </div>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>

</div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>

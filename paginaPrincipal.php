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
  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }
  $sql ="SELECT nombre, area FROM CURSO";
  if(isset($_POST['buscar']))
      $sql.=" WHERE nombre LIKE '%".$_POST['curso']."%'";
  $sql.="ORDER BY nombre;";
  $resultado = $connection->query($sql);
  $cont =1;

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
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CREATICA <span>Unlimited</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="Administrador.php">Aux</a></li>
          <li><a href="perfil.php" >Perfil </a></li>
          <li><a href="cerrarSesion.php" >Cerrar sesion   </a></li>

        </ul>
      </div>
    </div>
  </nav>


  <div >
    <section id="courses" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Cursos</h2>
            <p></p>
            <hr class="bottom-line">
          </div>
        </div>
      </div>
      <div style="display:flex;justify-content:center;align-items:center;">
        <div style="width:600px;">
          <form action="paginaPrincipal.php" method="POST"class="mc-trial row">


                <div class="form-group col-md-6 col-sm-4">
                  <div class=" controls">
                  <input type="text" name="curso" id="buscar" value="<?php echo isset($_POST['curso']) ? $_POST['curso'] : ''; ?>">
                  </div>
                </div>
                <!-- End email input -->
                <div class="col-md-6 col-sm-4">
                  <p>
                    <button name="buscar" type="submit" class="btn btn-block btn-submit">
                    Buscar <i class="fas fa-search"></i> </button>
                  </p>
                </div>
              </form>
        </div>
        </div>
        <div>
          <table class="table table-striped table-sm table-primary">
          <tr>
            <th>#</th>
            <th>CURSO</th>
            <th>AREA</th>

          </tr>
          <?php foreach ($resultado as $fila): ?>
            <tr>
              <td><?php echo $cont; $cont++; ?></td>
              <td><?php echo $fila['nombre'] ?></td>
              <td><?php echo $fila['area'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
        </div>
    </section>


  </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>

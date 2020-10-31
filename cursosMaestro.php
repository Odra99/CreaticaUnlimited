<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
}else{
  define('USER', 'root');
  define('PASSWORD', 'Jhon$19PVT');
  define('HOST', 'localhost');
  define('DATABASE', 'CreaticaUnlimited');
  try {
      $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }
  $year=$_POST['year'];
  $sql='';
  if($year==null){
    $sql ="SELECT * FROM HORARIO WHERE usuarioMaestro='".$_SESSION['user']."' AND año=(select YEAR(NOW()))";
  }else{
    $sql ="SELECT * FROM HORARIO WHERE usuarioMaestro='".$_SESSION['user']."' AND año='".$year."'";
  }
  if(isset($_POST['buscar']))
      {
        $sql.="AND curso LIKE '%".$_POST['curso']."%'";
      }
  $sql.="ORDER BY año ASC;";
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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

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
          <li><a href="cerrarSesion.php" >Cerrar sesion</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="paginaPrincipalMaestro.php" >Inicio</a></li>
        </ul>

      </div>
    </div>
  </nav>


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
        <form action="#" method="POST"class="mc-trial row">
              <div class="form-group col-md-6 col-sm-4">
                <div class=" controls">
                <input type="text" name="curso" id="buscar" value="<?php echo isset($_POST['curso']) ? $_POST['curso'] : ''; ?>">
                </div>
                <div class="form-group has-feedback">
                  <br>
                  <input class="form-control" placeholder="año del curso"  name="year" type="number" value="<?php echo isset($_POST['year']) ? $_POST['year'] : ''; ?>" autocomplete="on" required />
                </div>

              </div>
              <!-- End email input -->
              <div class="col-md-6 col-sm-4">
                <p>
                  <button name="buscar" type="submit" class="btn btn-block btn-submit">
                  Buscar <i class="fa fa-search"></i></button>
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
            <td><?php echo $fila['curso'] ?></td>
            <td><?php echo $fila['area'] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
      </div>
  </section>
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Crear clase</h4>
        </div>
        <div class="modal-body padtrbl">
         <div class="login-box-body">
            <p class="login-box-msg">Registrar horario</p>
            <div class="form-group">
              <form action="registrarHorario.php" method="post" >
              <input type="text" hidden name="curso" id="dataCourse" >
              <input type="text" hidden name="area" id="dataArea"  >
                <div class="form-group has-feedback">
                  <input class="form-control" placeholder="Costo" name="costo" type="text" autocomplete="on" required/>
                </div>
                <div class="form-group has-feedback">
                  <input class="form-control" placeholder="año" name="year" type="number" autocomplete="on" required />
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputPassword1">Fecha Inicio</label>
                  <input class="form-control"  name="fechaInicio" type="date" autocomplete="on" required />
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputPassword1">Fecha Fin</label>
                  <input class="form-control"  name="fechaFin" placeholder="fecha fin" type="date" autocomplete="on" required />
                </div>
                <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat">Aceptar</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer id="footer" class="footer">
    <div class="container text-center">
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
      </ul>
      @2020 CREATICA Unlimited
      <div class="credits">

      </div>
    </div>
  </footer>
  <!--/ Footer-->
  <script>
    function applyDatas(element){
     var identificador=element.id.toString();
     var numId=identificador.split(".");
     var area=numId[1];
     var curso=numId[2];
     var e1=document.getElementById("dataCourse");
     var e2=document.getElementById("dataArea");
     e1.setAttribute('value',curso);
     e2.setAttribute('value',area);
    }
  </script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>

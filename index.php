
<?php

if(isset($_SESSION['login_user_sys'])){
header("location: paginaPrincipal.php");
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
        <a class="navbar-brand" href="index.html">CREATICA <span>Unlimited</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" data-target="#login" data-toggle="modal">Ingresar</a></li>
          <li class="btn-trial"><a href="registrar.php">Registrarse</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  <!--Modal box-->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Ingresar Sesion</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Inicia tu sesion</p>
            <div class="form-group">
              <form action="inicioSesion.php" method="post" >
                <div class="form-group has-feedback">
                  <input class="form-control" placeholder="Usuario" name="usuario" type="text" autocomplete="on" required/>
                </div>
                <div class="form-group has-feedback">
                  <input class="form-control" placeholder="Contraseña" name="password" type="password" autocomplete="on" required />
                </div>
                <div class="row">

                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat">Ingresar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!--/ Faculity member-->
  <div class="clear"> </div>
    <span><?php echo $error; ?></span>
  </div>
  <!--Courses-->
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
    <div class="container">
      <div class="row">

        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/cursoIngles.png" class="img-responsive">
            <figcaption>
              <h3>Ingles Avanzado</h3>
              </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/desarrolloWeb.jpg" class="img-responsive">
            <figcaption>
              <h3>Desarrollo Web</h3>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>

        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course05.jpg" class="img-responsive">
            <figcaption>
              <h3>Oratoria y Lenguajes</h3>
              </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course06.jpg" class="img-responsive">
            <figcaption>
              <h3>Edicion de imagenes</h3>
                </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/cocinaInternacional.jpg" class="img-responsive">
            <figcaption>
              <h3>Cocina Internacional</h3>
              </figcaption>
            <a href="#"></a>
          </figure>
        </div>
      </div>
    </div>
  </section>
  <footer id="footer" class="footer">
    <div class="container text-center">
      <!-- End newsletter-form -->
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

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>

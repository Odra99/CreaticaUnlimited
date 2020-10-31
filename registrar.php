<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Ingreso de usuario nuevo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body >
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
          <li class="btn-trial"><a href="index.php">Inicio</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <br><br><br>
    <div class="container" style="width: 50%; ">
      <h1>Ingresar datos Usuario Nuevo</h1>
      <form action="crearUsuario.php" method="post">
        <div class="form-group">
            <label for="exampleInputPassword1">Nombre</label>
            <input type="text" class="form-control" required name="nombre" id="exampleInputPassword1" placeholder="nombre">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Usuario</label>
            <input type="text" class="form-control" required name="usuario" id="exampleInputPassword1" placeholder="usuario">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Apellidos</label>
            <input type="text" class="form-control" required name="apellidos" id="exampleInputPassword1" placeholder="apellidos">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Telefono</label>
            <input type="number" class="form-control" required name="telefono" id="exampleInputPassword1" placeholder="Telefono" maxlength="8" max="99999999">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" required name="clave" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" name="correo" class="form-control" required name="correo" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo electronico">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Rol</label>
          <select name="rol" required id="">
            <option value="1">Estudiante</option>
            <option value="2">Maestro</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear usuario</button>
      </form>
    </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  </body>
</html>

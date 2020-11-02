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
  $year=$_POST['year'];
  $sql='';

  $sql ="SELECT * FROM INSCRITO I inner JOIN HORARIO H ON H.codigo=I.codigoCurso  WHERE year=(SELECT YEAR(now())) AND I.estado=1 AND I.codigoEstudiante='".$_SESSION['user']."' ";

  if(($_POST['buscar'])!=null)
      {
        $sql.="AND curso LIKE '%".$_POST['curso']."%'";
      }
  $sql.=";";
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
  <?php include("navEstudiante.html"); ?>


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
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>

          <th></th>
        </tr>
        <?php foreach ($resultado as $fila): ?>
          <tr>
            <td><?php echo $cont; $cont++; ?></td>
            <td><?php echo $fila['curso'] ?></td>
            <td><?php echo $fila['fechaInicio'] ?></td>
            <td><?php echo $fila['fechaFin'] ?></td>
            <td>
              <form action="cerrarCurso.php" method="post">
              <input type="text" name="codigo" value="<?php echo $fila['codigo'] ?> " id="" hidden>
              <button data-target="#registrar" data-toggle="modal"   type="submit"
                  class="btn btn-block btn-submit" style="width: 140px; font-size: 10px;"
                  >
                  Abandonar en clase
              </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      </div>
  </section>




  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>

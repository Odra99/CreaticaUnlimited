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
  if($year==null){
    $sql ="SELECT h.*, hs.* FROM HORARIO as h INNER JOIN HORARIOSEMANA as hs ON hs.codigo=h.codigo WHERE usuarioMaestro='".$_SESSION['user']."' AND year=(select YEAR(NOW())) ";
  }else{
    $sql ="SELECT h.*,hs.* FROM HORARIO as h INNER JOIN HORARIOSEMANA as hs ON hs.codigo=h.codigo WHERE usuarioMaestro='".$_SESSION['user']."' AND year='".$year."'";
  }
  if(isset($_POST['buscar']))
      {
        $sql.="AND curso LIKE '%".$_POST['curso']."%'";
      }
  $sql.="ORDER BY year ASC;";
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
  <?php include("navMaestro.html") ?>


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
        <form action="cursosMaestro.php" method="POST"class="mc-trial row">
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
          <th>HORARIO</th>

        </tr>
        <?php foreach ($resultado as $fila): ?>
          <tr>
            <td><?php echo $cont; $cont++; ?></td>
            <td><?php echo $fila['curso'] ?></td>
            <td><?php echo $fila['area'] ?></td>
            <td> <?php if($fila['lunes']==1){echo "Lunes ";};
            if($fila['martes']==1){echo "Martes ";};
            if($fila['miercoles']==1){echo "Miercoles ";};
            if($fila['jueves']==1){echo "Jueves" ;};
            if($fila['viernes']==1){echo "Viernes" ;};
            if($fila['sabado']==1){echo "Sabado" ;};
            if($fila['domingo']==1){echo "Domingo" ;}; ?> </td>
          </tr>
        <?php endforeach; ?>
      </table>
      </div>
  </section>


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

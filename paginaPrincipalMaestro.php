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
  $sql ="SELECT nombre, area FROM CURSO";
  if(isset($_POST['buscar']))
      {
        $sql.=" WHERE nombre LIKE '%".$_POST['curso']."%'";
      }
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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
<?php include("navMaestro.html"); ?>


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
        <form action="paginaPrincipalMaestro.php" method="POST"class="mc-trial row">
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
          <th></th>
        </tr>
        <?php foreach ($resultado as $fila): ?>
          <tr>
            <td><?php echo $cont; $cont++; ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['area'] ?></td>
            <td>
              <button data-target="#login" data-toggle="modal" id="<?php echo "curso.".$fila['area'].".".$fila['nombre'] ?>"  type="submit"
                  class="btn btn-block btn-submit" style="width: 100px; font-size: 10px;"
                    onclick="applyDatas(this);">
              Asignar clase
              </button>
            </td>
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
              <div class="form-group" style="width: 75%;" >
                  <label>Costo Q. </label></br>
                <input type="number" step="0.01" name="costo" min="0" class="form-control form" required oninvalid="setCustomValidity('Por favor defina el costo del curso')"
                       oninput="setCustomValidity('')" />
              </div>
                <div class="form-group has-feedback">
                  <input class="form-control" placeholder="año" name="year" type="number" maxlength="4" autocomplete="on" required />
                </div>
                <div class="form-group">
                  <label><i class="far fa-calendar-alt"></i> Fecha Inicio</label></br>
                 <input type="date" name="fechaInicio"  required/>
                </div>
                <div class="form-group">
                <label><i class="far fa-calendar-alt"></i> Fecha Fin</label></br>
               <input type="date" name="fechaFin"  required />
              </div>
                <div class="form-group has-feedback">
                  <input class="form-control" placeholder="Duracion de clase" name="duracion" type="number" autocomplete="on" required />
                </div>
                  <label>Seleccione los dias de clase</label><br>

                  <label for="exampleInputPassword1">Lunes</label>
                  <input  name="L" placeholder="fecha fin" type="checkbox" autocomplete="on"  value="1" />
                  <label for="exampleInputPassword1">Martes</label>
                  <input  name="M" placeholder="fecha fin" type="checkbox" autocomplete="on" value="1" />
                  <label for="exampleInputPassword1">Miercoles</label>
                  <input   name="MM" placeholder="fecha fin" type="checkbox" autocomplete="on" value="1"/>
                  <label for="exampleInputPassword1">Jueves</label>
                  <input   name="J" placeholder="fecha fin" type="checkbox" autocomplete="on" value="1"/>
                  <label for="exampleInputPassword1">Viernes</label>
                  <input   name="V" placeholder="fecha fin" type="checkbox" autocomplete="on" value="1" />
                  <label for="exampleInputPassword1">Sabado</label>
                  <input   name="S" placeholder="fecha fin" type="checkbox" autocomplete="on" value="1"/>
                  <label for="exampleInputPassword1">Domingo</label>
                  <input   name="D" placeholder="fecha fin" type="checkbox" autocomplete="on" value="1"/>
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

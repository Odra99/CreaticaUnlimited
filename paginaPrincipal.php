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
  $sql="SELECT c.nombre AS nombre, c.area As area, h.usuarioMaestro,hs.lunes,hs.martes,hs.miercoles ";
  $sql.=",hs.jueves,hs.viernes,hs.sabado,hs.domingo, h.duracion ,h.codigo, p.nombre  AS maestro";
  $sql.=" FROM CURSO c INNER JOIN HORARIO h ON c.area=h.area ";
  $sql.="AND h.curso=c.nombre INNER JOIN HORARIOSEMANA hs ON hs.codigo=h.codigo  ";
  $sql.="INNER JOIN PERFIL p ON h.usuarioMaestro=p.usuario   WHERE h.year=(SELECT YEAR(NOW())) AND (select validarCurso(h.codigo)) ";


  if(isset($_POST['buscar']))
      {
        $sql.=" AND c.nombre LIKE '%".$_POST['curso']."%'";
      }
  $sql.=" ORDER BY c.nombre;";
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
  <?php include("navEstudiante.html"); ?>

  <style>
    .l ,.m,.mm,.j,.v,.s,.d  {
      display: none;
    }
    .l h3,.m h3,.mm h3,.j h3,.v h3,.s h3,.d  h3 {
      font-size: 15px;
    }

    .visible{
      display: block;
    }
  </style>
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
          <th>Maestro</th>
          <th>Informacion extra</th>
          <th></th>
        </tr>

        <?php foreach ($resultado as $fila): ?>
          <tr>
            <td><?php echo $cont; $cont++; ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['area'] ?></td>
            <td><?php echo $fila['maestro'] ?></td>
            <td>
              <button data-target="#showInfo" data-toggle="modal" id="<?php echo "curso.".$fila['area'].".".$fila['nombre'] ?>"  type="submit"
                  class="btn btn-block btn-submit" style="width: 140px; font-size: 10px; background:darkslateblue; border-radius:10px;"
                    onclick=" getDays('<?php echo $fila['lunes'] ?>','<?php echo $fila['martes'] ?>'
                    ,'<?php echo $fila['miercoles'] ?>','<?php echo $fila['jueves'] ?>','<?php echo $fila['viernes'] ?>'
                    ,'<?php echo $fila['sabado'] ?>','<?php echo $fila['domingo'] ?>','<?php echo $fila['duracion'] ?>');"
                  >
                  Mostrar info.
              </button>
            </td>

            <td>
              <form action="incribirse.php" method="post">
              <input type="text" name="codigo" value="<?php echo $fila['codigo'] ?>" id="" hidden>

              <button data-target="#registrar" data-toggle="modal"   type="submit"
                  class="btn btn-block btn-submit" style="width: 140px; font-size: 10px;"
                  >
                  Registrarse en clase
              </button>
              </form>
            </td>

          </tr>
        <?php endforeach; ?>
      </table>
      </div>
  </section>
  <div class="modal fade" id="showInfo" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body padtrbl">
         <div class="login-box-body">
            <div class="form-group">
              <h3>Horario:</h3>
              <div class="container-days">
                  <div class="l">
                  <h3>Lunes</h3>
                  <input type="radio" name="" disabled id="l">
                  </div>
                  <div class="m">
                  <h3>Martes</h3>
                  <input type="radio" name="" disabled id="m">
                  </div>
                  <div class="mm">
                  <h3>Miercoles</h3>
                  <input type="radio" name="" disabled id="mm">
                  </div>
                  <div class="j">
                  <h3>Jueves</h3>
                  <input type="radio" name="" disabled id="j">
                  </div>
                  <div class="v">
                  <h3>Viernes</h3>
                  <input type="radio" name="" disabled id="v">
                  </div>
                  <div class="s">
                  <h3>Sabado</h3>
                  <input type="radio" name="" disabled id="s">
                  </div>
                  <div class="d">
                  <h3>Domingo</h3>
                  <input type="radio" name="" disabled id="d">
                  </div>
                  <p id="timeClass"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function getDays(lunes,martes,miercoles,jueves,viernes,sabado,domingo,time){
      verifyDay(lunes,"l");
      verifyDay(martes,"m");
      verifyDay(miercoles,"mm");
      verifyDay(jueves,"j");
      verifyDay(viernes,"v");
      verifyDay(viernes,"s");
      verifyDay(viernes,"d");
      var el=document.getElementById("timeClass").innerHTML="Duracion de cada clase (en hora): "+(time?time:"0");

    }

    function verifyDay(element,name){
      var el=document.getElementsByClassName(name);
      if(element=='1'){
        el[0].classList.add('visible');
        setCheck(name);
      }else{
         try{
          el[0].classList.remove("visible");
         }catch(err){}
      }
      console.log(el);
    }
    function setCheck(element){
      var elemn=document.getElementById(element).checked=true;
    }





  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>

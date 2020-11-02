<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
}
if($_SESSION['rol']!=0){
  header("location: index.php");
}
if (!(isset($_POST['costo']) || isset($_POST['year'])
    || isset($_POST['fechaInicio']) || isset($_POST['fechaFin'])
    || isset($_POST['curso']) || isset($_POST['area']))) {
    header("location: paginaPrincipalMaestro.php");
}
$maestro=$_SESSION['user'];
$costo=$_POST['costo'];
$year=$_POST['year'];
$fechaInicio=$_POST['fechaInicio'];
$fechaFin=$_POST['fechaFin'];
$curso=$_POST['curso'];
$area=$_POST['area'];
$horario=$_POST['duracion'];
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

$sql_table="(usuarioMaestro,costo,fechaInicio,fechaFin,year,curso,area,duracion)";
$sql_valid="select validarFechas('".$fechaInicio."','".$fechaFin."','".$year."');";
$resultado=$connection->query($sql_valid)->fetchColumn(0);
if($resultado[0]==1){
  $sql ="INSERT INTO HORARIO ".$sql_table." VALUES('".$maestro."','".$costo."','".$fechaInicio."','".$fechaFin."','".$year."','".$curso."','".$area."','".$horario."');";
  if($connection->query($sql)){
      $lunes=$_POST['L'];
      $martes=$_POST['M'];
      $miercoles=$_POST['MM'];
      $jueves=$_POST['J'];
      $viernes=$_POST['V'];
      $sabado=$_POST['S'];
      $domingo=$_POST['D'];
      if($lunes==null){
        $lunes=0;
      }
      if($martes==null){
        $martes=0;
      }
      if($miercoles==null){
        $miercoles=0;
      }
      if($jueves==null){
        $jueves=0;
      }
      if($viernes==null){
        $viernes=0;
      }
      if($sabado==null){
        $sabado=0;
      }
      if($domingo==null){
        $domingo=0;
      }
      $sql="SELECT codigo FROM HORARIO ORDER BY CODIGO DESC LIMIT 1;";
      $resultado=$connection->query($sql);
      foreach($resultado as $row ){
          $sql="INSERT INTO HORARIOSEMANA (codigo, lunes, martes, miercoles, jueves, viernes, sabado, domingo) VALUES('".$row['codigo']."','".$lunes."','".$martes."','".$miercoles."','".$jueves."','".$viernes."','".$sabado."','".$domingo."')";
          $connection->query($sql);
        }
  }


}

header("location: paginaPrincipalMaestro.php?error=".$resultado[0]);

?>

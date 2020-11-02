<?php
session_start();
$codigo=$_POST['codigo'];
$user=$_SESSION['user'];
if($user==null){
  header("location: index.php");
}else if(isset($_POST['codigo'])){

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
$sql="INSERT INTO INSCRITO (codigoEstudiante,codigoCurso,estado) VALUES";
$sql.="('".$user."' , '".$codigo."' , '1');";
if($connection->query($sql)){

  header("location: paginaPrincipal.php?mensaje=inscripcion completada");
}else{
  header("location: paginaPrincipal.php?mensaje=error No se pudo inscribir");
  }
}
  header("location: paginaPrincipal.php?mensaje=");
?>

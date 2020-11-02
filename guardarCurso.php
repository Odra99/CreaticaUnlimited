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
  $sql ="INSERT INTO CURSO (nombre, area, descripcion) VALUES";
  $sql.="('".$_POST['nombre']."','".$_POST['area']."','".$_POST['descripcion']."')";

  if($connection->query($sql)){
    header("location: Administrador.php?mensaje=Curso creado con exito");
  }else{
    header("location: crearCurso.php?error=El curso no se pudo crear el curso&nombre=".$_POST['nombre']."&area=".$_POST['area']."&descripcion=".$_POST['descripcion']);
  }

}
?>

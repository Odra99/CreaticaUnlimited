<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
}else{

  define('USER', 'root');
  define('PASSWORD', 'Inegap11');
  define('HOST', 'localhost');
  define('DATABASE', 'CreaticaUnlimited');
  try {
      $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }
  $sql ="INSERT INTO CURSO (nombre, area, descripcion,costo) VALUES";
  $sql.="('".$_POST['nombre']."','".$_POST['area']."','".$_POST['descripcion']."','".$_POST['costo']."')";

  if($connection->query($sql)){
    header("location: Administrador.php?mensaje=Curso creado con exito");
  }else{
    header("location: crearCurso.php?error=El curso no se pudo crear el curso&nombre=".$_POST['nombre']."&area=".$_POST['area']."&descripcion=".$_POST['descripcion']."&costo=".$_POST['costo']);
  }

}
?>

<?php
session_start();
if(!$_SESSION['user']){
  header("location: ../index.php");
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
  $sql ="UPDATE  CURSO SET nombre='".$_POST['nombre']."' , descripcion='".$_POST['descripcion']."' , area='".$_POST['area']."' WHERE nombre=";
  $sql.="'".$_POST['nombreAntiguo']."'";

echo "$sql";
  if($connection->query($sql)){
    header("location: ../Administrador.php?mensaje=Curso modificado con exito");
  }else{
    header("location:  ../Administrador.php?mensaje=El curso no se pudo modificar");
  }


}
?>

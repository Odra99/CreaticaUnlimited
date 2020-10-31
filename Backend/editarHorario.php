<?php
session_start();
if(!$_SESSION['user']){
<<<<<<< HEAD
  header("location: ../index.php");
=======
<<<<<<< HEAD
  header("location: index.php");
=======
  header("location: ../index.php");
>>>>>>> Jhony
>>>>>>> main
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

  if(isset($_POST['editar'])){
      header("location:  ../editarHorario.php?codigoHorario=".$_POST['codigo']."&nombre=".$_POST['nombre']."&nombreMaestro=".$_POST['nombreMaestro']);
  }else{
    if($_POST['estado']=='EN PROCESO'){
      $sql = "DELETE FROM HORARIO WHERE codigoHorario='".$_POST['codigo']."'";
      if($connection->query($sql)){
        header("location: ../Administrador.php?mensaje=El horario del curso eliminado con exito");
      }else{
        header("location:  ../Administrador.php?mensaje=El horario del curso no se pudo eliminar");

      }

    }else{
        header("location:  ../Administrador.php?mensaje=El horario del curso no se pudo eliminar porque ya esta inicializado/completado");
    }

  }







}
?>

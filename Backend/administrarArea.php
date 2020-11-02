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

  if(isset($_POST['Editar'])){
      header("location:  ../crearArea.php?accion=Guardar&nombre=".$_POST['nombre']);
  }else if (isset($_POST['Crear'])){
    $sql = "INSERT INTO AREA (nombre) VALUES";
    $sql.= "('".$_POST['nombre']."')";
    if($connection->query($sql)){
      header("location: ../Administrador.php?mensaje=El area ".$_POST['nombre']." creada con exito");
    }else{
      header("location:  ../Administrador.php?mensaje=El area ".$_POST['nombre']." no fue creada");

    }
  }else if (isset($_POST['Guardar'])){
    $sql = "UPDATE AREA SET nombre='".$_POST['nombre']."' WHERE nombre='".$_POST['nombreAntiguo']."'";
    if($connection->query($sql)){
      header("location: ../Administrador.php?mensaje=El area de nombre ".$_POST['nombreAntiguo']." se cambio por ".$_POST['nombre']." con exito");
    }else{
      header("location:  ../Administrador.php?mensaje=El area de nombre ".$_POST['nombreAntiguo']." no se pudo modificar");

    }
  }else{

      $sql = "DELETE FROM AREA WHERE codigoHorario='".$_POST['codigo']."'";
      if($connection->query($sql)){
        header("location: ../Administrador.php?mensaje=El area de nombre ".$_POST['nombre']." eliminada con exito");
      }else{
        header("location:  ../Administrador.php?mensaje=El area de nombre ".$_POST['nombre']." no se pudo eliminar");

      }



  }







}
?>

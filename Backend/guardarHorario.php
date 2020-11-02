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
  if(isset($_POST['modificar'])){
    $sql = "UPDATE  HORARIO SET usuarioMaestro='".$_POST['usuario']."',fechaInicio='".$_POST['fechaInicio']."',fechaFin='".$_POST['fechaFin']."',clases='".$_POST['clases']."', estado='".$_POST['estado']."' WHERE codigoHorario='".$_POST['codigo']."'";
    if($connection->query($sql)){
      header("location: ../Administrador.php?mensaje=Horario del curso modificado con exito");
    }else{
      header("location:  ../Administrador.php?mensaje=El horario del curso no se pudo modificar");

    }
  }else{
    $sql = "SELECT codigo FROM CURSO WHERE nombre='".$_POST['nombre']."'";

    $resultado = $connection->query($sql);
     foreach($resultado as $fila) $curso=$fila;

     if(isset($curso)){
       $sql ="INSERT into HORARIO (usuarioMaestro, fechaInicio, fechaFin, codigoCurso, clases,estado) VALUES";
       $sql .= "('".$_POST['usuario']."','".$_POST['fechaInicio']."','".$_POST['fechaFin']."','".$curso['codigo']."','".$_POST['clases']."','EN PROCESO')";
       if($connection->query($sql)){
         header("location: ../Administrador.php?mensaje=Registro del curso ingresado con exito");
       }else{
         header("location:  ../Administrador.php?mensaje=El registro del curso no se pudo ingresar");

       }
     }else{
       header("location:  ../Administrador.php?mensaje=El registro del curso no se pudo ingresar");

     }
  }




}
?>

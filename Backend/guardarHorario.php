<?php
session_start();
if(!$_SESSION['user']){
  header("location: ../index.php");
}else{

  define('USER', 'root');
  $passwordAcceso = include 'ControlAcceso.php';
  define('PASSWORD', 'Inegap11');
  define('HOST', 'localhost');
  define('DATABASE', 'CreaticaUnlimited');
  try {
      $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }
  if(isset($_POST['modificar'])){
    $sql = "UPDATE  HORARIO SET usuarioMaestro='".$_POST['usuario']."',fechaInicio='".$_POST['fechaInicio']."',fechaFin='".$_POST['fechaFin']."', year='".$_POST['year']."', duracion='".$_POST['clases']."' WHERE codigo='".$_POST['codigo']."'";
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
      foreach($resultado as $row ){
          $sql="UPDATE HORARIOSEMANA SET lunes='".$lunes."',martes='".$martes."',miercoles='".$miercoles."',jueves='".$jueves."',viernes='".$viernes."',sabado='".$sabado."',domingo='".$domingo."' WHERE codigo='".$_POST['codigo']."'";
          $connection->query($sql);
        }
      header("location: ../Administrador.php?mensaje=Horario del curso modificado con exito");
    }else{
      header("location:  ../Administrador.php?mensaje=El horario del curso no se pudo modificar");

    }
  }else{
    $sql = "SELECT area FROM CURSO WHERE nombre='".$_POST['nombre']."'";

    $resultado = $connection->query($sql);
     foreach($resultado as $fila) $curso=$fila;

     if(isset($curso)){
       $sql_valid="select validarFechas('".$_POST['fechaInicio']."','".$_POST['fechaFin']."','".$_POST['year']."');";
       $resultado=$connection->query($sql_valid)->fetchColumn(0);
       if($resultado[0]==1){
       $sql ="INSERT into HORARIO (usuarioMaestro, fechaInicio, fechaFin, duracion,area, curso, year,costo) VALUES";
       $sql .= "('".$_POST['usuario']."','".$_POST['fechaInicio']."','".$_POST['fechaFin']."','".$_POST['clases']."','".$curso['area']."','".$_POST['nombre']."','".$_POST['year']."','".$_POST['costo']."')";
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
           $sql="INSERT INTO HORARIOSEMANA (codigo, lunes, martes, miercoles, jueves, viernes, sabado, domingo) VALUES";
           $sql.="('".$row['codigo']."','".$lunes."','".$martes."','".$miercoles."','".$jueves."','".$viernes."','".$sabado."','".$domingo."')";
            $connection->query($sql);
           }
         header("location: ../Administrador.php?mensaje=Registro del curso ingresado con exito");
       }else{
         header("location:  ../Administrador.php?mensaje=El registro del curso no se pudo ingresar");

       }
     }else{
        header("location:  ../Administrador.php?mensaje=El registro del curso no se pudo ingresar");
     }
     }else{
       header("location:  ../Administrador.php?mensaje=El registro del curso no se pudo ingresar");

     }
  }




}
?>

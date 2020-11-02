<?php
session_start();
if(!$_SESSION['user']){

  header("location: ../index.php");

}else{
 
  define('USER', 'root');
  $passwordAcceso = include '../ControlAcceso.php';

  define('PASSWORD', $passwordAcceso);
  define('HOST', 'localhost');
  define('DATABASE', 'CreaticaUnlimited');
  try {
      $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
  } catch (PDOException $e) {
      exit("Error: " . $e->getMessage());
  }
  if(isset($_POST['eliminar'])){
    $sql = "DELETE FROM PERFIL WHERE usuario='".$_POST['usuarioAntiguo']."'";
    if($connection->query($sql)){

      header("location: ".$_POST['direccion']."?mensaje=Perfil eliminado con exito");
    }else{
      header("location:  ".$_POST['direccion']."?mensaje=El perfil no se pudo eliminar");
    }
  }else{
    $sql ="UPDATE  PERFIL SET nombre='".$_POST['nombre']."' , apellido='".$_POST['apellido']."', correoElectronico='".$_POST['correo']."' , usuario='".$_POST['usuario']."' , password = '".$_POST['password']."' , telefono='".$_POST['telefono']."' , descripcion='".$_POST['descripcion']."' WHERE usuario=";
    $sql.="'".$_POST['usuarioAntiguo']."'";

    if($connection->query($sql)){
          $sql = "SELECT * FROM MAESTRO WHERE usuario=";
          $sql.="'".$_POST['usuarioAntiguo']."'";
          $count = 0;
          $resultado = $connection->query($sql);
          foreach($resultado as $fila) $count++;
          if($count==0 && isset( $_POST['maestro'])){
                $sql = "INSERT INTO MAESTRO (usuario, estado) VALUES ";
                $sql.= "('".$_POST['usuario']."','PRESENTE')";
                if($connection->query($sql)){
                  header("location: ".$_POST['direccion']."?mensaje=Perfil modificado con exito");
                }else{
                  header("location:  ".$_POST['direccion']."?mensaje=El perfil no se pudo modificar");
                }
          }else{
             if(!isset($_POST['maestro'])){
                $_POST['estado'] = 'ELIMINADO';
             }
              $sql = "UPDATE  MAESTRO SET usuario='".$_POST['usuario']."' , estado='".$_POST['estado']."' WHERE usuario='".$_POST['usuarioAntiguo']."'";
              if($connection->query($sql)){
                header("location: ".$_POST['direccion']."?mensaje=Perfil modificado con exito");
              }else{
                header("location:  ".$_POST['direccion']."?mensaje=El perfil no se pudo modificar");
              }
           }
    }else{
      header("location:  ".$_POST['direccion']."?mensaje=El perfil no se pudo modificar");
    }
  }


}
?>

<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
$url="index.php";
if (!(isset($_POST['usuario']) || isset($_POST['password']))) {
$error = "Usuario o contraseña es invalido";
}
else
{
$username=$_POST['usuario'];
$password=$_POST['password'];
    $connection = new  mysqli("localhost","root","Inegap11","CreaticaUnlimited");
$sql ="SELECT * FROM PERFIL WHERE usuario = '" . $username . "' AND password='".$password."'LIMIT 1";
$count = 0;
$resultado = $connection->query($sql);
 foreach($resultado as $fila) $count++;
  if ($count==1){
        $url = "paginaPrincipal.php";
        $_SESSION['user']=$username;
      } else {
$error = "El Usuario o la contraseña es inválida.";
  }
}
  header("location:".$url);
?>

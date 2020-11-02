
<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
$url='index.php';  //url de redireccion
if (!(isset($_POST['usuario']) || isset($_POST['password']))) {
$error = "Usuario o contraseña es invalido";
} else {
// Define $username y $password
$username=$_POST['usuario'];
$password=$_POST['password'];
//$conexion = new mysqli("servidor","usuario","clave","bd")
define('USER', 'root');
$passwordAcceso = include 'ControlAcceso.php';
define('PASSWORD', $passwordAcceso);
define('HOST', 'localhost');
define('DATABASE', 'CreaticaUnlimited');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    //$conexion = new mysqli("root","Jhon$19PVT","localhost","CreaticaUnlimited");

} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

if(isset($_POST['Administrador'])){
  $sql = "SELECT *  FROM ADMINISTRADOR WHERE usuario='".$username."' AND password ='".$password."'";
  $resultado = $connection->query($sql);
  $valid=false;
  foreach ($resultado as $row) {
    $valid =true;
  }
  if ($valid){
          $_SESSION['user']=$username; // Iniciando la sesion
          $url="Administrador.php";
  } else {
  $error = "El Usuario o la contraseña es inválida.";

  }


}else{
  $sql ="SELECT * FROM PERFIL WHERE usuario = '" . $username . "' AND password='".$password."';";
  $resultado = $connection->query($sql);
  $valid=false;
  $rol=-1;
  foreach ($resultado as $row){
      $valid=true;
      $sql = "SELECT * FROM MAESTRO WHERE usuario = '" . $username ."'";
      $resultado=$connection->query($sql);
      $active=0;
      foreach ($resultado as $fila){
          $rol=0;
          $valid=false;
          $url = "paginaPrincipalMaestro.php";
          $active=$fila['estado'];
      }
      if($valid){
          $rol=1;
          $url = "paginaPrincipal.php";
      }
      $valid=true;
      if($rol==0 && $active=="0"){
          $valid=false;
          $url="index.php";
      }
  }

  if ($valid){
          $_SESSION['user']=$username; // Iniciando la sesion
          $_SESSION['rol']=$rol;
  } else {
  $error = "El Usuario o la contraseña es inválida.";

    }

}}
echo $sql;
header("location: ".$url);
?>

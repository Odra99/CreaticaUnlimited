<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
$url='';  //url de redireccion
if (!(isset($_POST['usuario']) || isset($_POST['password']))) {
$error = "Usuario o contraseña es invalido";
$url = "index.php";
}

else
{
// Define $username y $password
$username=$_POST['usuario'];
$password=$_POST['contraseña'];
//$conexion = new mysqli("servidor","usuario","clave","bd")
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'CreaticaUnlimited');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
$sql ="SELECT usuario, contraseña FROM PERFIL WHERE usuario = '" . $username . "' AND contraseña='".$password."';";

$resultado = $connection->query($sql);
if (isset($resultado)){
        $_SESSION['login_user_sys']=$username; // Iniciando la sesion
        $url = "paginaPrincipal.php";
        $_SESSION['user']=$username;

} else {
$error = "El Usuario o la contraseña es inválida.";
}
}
header("location: ".$url);
?>

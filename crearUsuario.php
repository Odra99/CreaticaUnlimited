<?php
$error=''; // Variable para almacenar el mensaje de error
$url = "registrar.php";  //url de redireccion
if (!(isset($_POST['usuario']) || isset($_POST['clave'])
|| isset($_POST['nombre'])
|| isset($_POST['correo'])
|| isset($_POST['telefono'])
|| isset($_POST['apellidos'])
|| isset($_POST['rol']))) {
}else{
    $user=$_POST['usuario'];
    $clave=$_POST['clave'];
    $apelido=$_POST['apellidos'];
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $email=$_POST['correo'];
    $rol=$_POST['rol'];

$username=$_POST['usuario'];
$password=$_POST['contraseña'];
define('USER', 'root');
$passwordAcceso = include 'ControlAcceso.php';
define('PASSWORD', $passwordAcceso);
define('HOST', 'localhost');
define('DATABASE', 'CreaticaUnlimited');
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {}
$sql ="INSERT INTO PERFIL VALUES('".$nombre."','".$apelido."','".$email."','".$telefono."','".$user."','".$clave."');";

if ($connection->query($sql)){
    $sql="call registrarPerfil('".$user."',".$rol.");";
    $connection->query($sql);
    $url="index.php";
}

header("location: ".$url);

}
?>

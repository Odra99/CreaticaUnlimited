<?php
session_start();
$codigo=$_POST['codigo'];
$user=$_SESSION['user'];
if($user==null){
  header("location: index.php");
}else if($codigo!=null){
$sql="UPDATE INSCRITO SET estado=0 WHERE codigoCurso=".$codigo." ;";

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
$connection->query($sql);
echo $sql;
}
header("location: abandonarClase.php");
?>

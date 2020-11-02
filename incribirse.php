<?php
session_start();
$codigo=$_POST['codigo'];
$user=$_SESSION['user'];
if($user==null){
  header("location: index.php");
}else if($codigo!=null){
$sql="INSERT INTO INSCRITO (codigoEstudiante,codigoCurso,estado)";
$sql.=" VALUES('".$user."' , ".$codigo." , 1);";
define('USER', 'root');
define('PASSWORD', 'Jhon$19PVT');
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
header("location: paginaPrincipal.php");
?>

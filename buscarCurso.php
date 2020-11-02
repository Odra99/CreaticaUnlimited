<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
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
  $sql ="SELECT * FROM CURSO WHERE nombre=";
  $sql.="'".$_POST['nombre']."";

  $resultado = $connection->query($sql);
   foreach($resultado as $fila) $curso=$fila;


}
?>

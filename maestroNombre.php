<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
$passwordAcceso = include 'ControlAcceso.php';
define('PASSWORD', $passwordAcceso);
define('DB_NAME', 'CreaticaUnlimited');


if (isset($_GET['term'])){
  $myObj->name = "";

    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";port=8889;dbname=".DB_NAME, DB_USER, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = "SELECT concat(nombre,' ',apellido) as nombreP FROM PERFIL WHERE usuario = '".$_GET['term']."'";



            $row = $conn->query($stmt);
            foreach ($row as $key) $fila = $key;
              $myObj->name = $fila['nombreP'];



    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($myObj);
}

?>

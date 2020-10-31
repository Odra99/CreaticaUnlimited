<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Inegap11');
define('DB_NAME', 'CreaticaUnlimited');


if (isset($_GET['term'])){
  $myObj->name = "";

    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";port=8889;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
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

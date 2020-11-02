<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
$passwordAcceso = include 'ControlAcceso.php';
define('PASSWORD', $passwordAcceso);
define('DB_NAME', 'CreaticaUnlimited');


if (isset($_GET['term'])){
    $return_arr = array();

    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";port=8889;dbname=".DB_NAME, DB_USER, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT usuario FROM PERFIL WHERE usuario LIKE :term');
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['usuario'];
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}

?>

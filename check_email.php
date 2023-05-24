<?php
    /*******************************************************
        Controlla che l'email non sia già in uso
    ********************************************************/
    require_once 'dbconfig.php';
    
    // Controllo che l'accesso sia legittimo
    if (!isset($_GET["q"])) {
        echo "Command not valid";
        exit;
    }

    header('Content-Type: application/json');
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']);
    $email = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "SELECT email FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    //restituisco un json che contiene un booleano che indica se l'email è già in uso
    //true = email già in uso; false = email non in uso
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));
    mysqli_close($conn);
?>
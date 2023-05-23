<?php 
    /*************************************************************************************
        Controlla che il player_tag non sia già in uso e, in caso positivo, che sia valido
    **************************************************************************************/
    require_once 'dbconfig.php';
    require_once 'token.php';

    if (!isset($_GET["q"])) {
        echo "Command not valid";
        exit;
    }

    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']);
    $player_tag = mysqli_real_escape_string($conn, $_GET["q"]);

    // Controllo che il player_tag non sia già in uso
    $query = "SELECT username FROM user WHERE player_tag = '$player_tag'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $exists = mysqli_num_rows($res) > 0 ? true : false;
    mysqli_free_result($res);

    // Restituzione diretta se il player_tag è già in uso
    if($exists){
        echo json_encode(array('exists' => $exists));
        mysqli_close($conn);
        exit;
    }
    // Controllo che il player_tag sia valido solo se non è già in uso
    $url = "https://api.clashroyale.com/v1/players/" . urlencode($player_tag);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json', 
        'Authorization: Bearer ' . $token));
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);
    $valid = isset($result['reason']) ? false : true;

    // Restituzione dell'oggetto JSON combinato
    echo json_encode(array('exists' => $exists, 'valid' => $valid));
    mysqli_close($conn);
?>
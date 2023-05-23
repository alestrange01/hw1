<?php 
    /******************************************
        Ritorno le carte di Clash Royale
    *****************************************/
    require_once 'token.php';


    $url = "https://api.clashroyale.com/v1/cards";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Authorization: Bearer ' . $token
    ));
    $res = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($res, true);
    if (isset($data["reason"])) {
        echo "<p>", "Failed: ", $data["reason"], " : ", isset($data["message"]) ? $data["message"] : "", "</p></body></html>";
        exit;
    }
    echo json_encode($data);
    
?>
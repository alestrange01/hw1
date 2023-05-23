<?php 
    /************************************************************************
        Prendo le info del player loggato/richiesto: stats e upcomming chests
    *************************************************************************/

    require_once 'token.php';

    if (isset($_POST['player_tag'])) {
        //Se è settato il tag del player, vuol dire che siamo nella ricerca player
        $userid = $_POST['player_tag'];
    }else if(isset($_GET['clan_player_tag'])){
        //Se è settato il clan_player_tag, vuol dire che siamo nella ricerca player da ricerca clan
        $userid = $_GET['clan_player_tag'];
    }
    else {
        //Se non è settato il tag del player, vuol dire che siamo nella home personale
        require_once 'auth.php';
        if (!checkAuth()) {
            header("Location: login.php");
            exit;
        }
        $userid = $_SESSION["user_tag"];
    }
    /* Se il controllo è passato, vuol dire che:
        -l'utente è loggato e dobbiamo mostrare le info nella sua home
        -siamo nella ricerca player e dobbiamo mostrare le info del player richiesto*/

    //Allora devo prendere le informazioni tramite le API di Clash Royale
    
    $url = "https://api.clashroyale.com/v1/players/". urlencode($userid);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Authorization: Bearer ' . $token
    ));
    $res = curl_exec($ch);
    curl_close($ch);
    $data1 = json_decode($res, true);
    if (isset($data1["reason"])) {
        $response = array("player_info" => array("exists" => false));
        echo json_encode($response);
        exit;
    }
    $data1["exists"] = true;


    //Prendo le info delle upcoming chests tramite le API di Clash Royale
    $url = "https://api.clashroyale.com/v1/players/". urlencode($userid) . "/upcomingchests";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Authorization: Bearer ' . $token
    ));
    $res = curl_exec($ch);
    curl_close($ch);
    $data2 = json_decode($res, true);
    if (isset($data2["reason"])) {
        $response = array("exists" => false);
        echo json_encode($response);
        exit;
    }
    $data2["exists"] = true;

    $data = array("player_info" => $data1, "upcoming_chests" => $data2);

    if (isset($_POST['player_tag'])) unset($_POST['player_tag']);
    if (isset($_POST['clan_player_tag'])) unset($_POST['clan_player_tag']);

    echo json_encode($data);


    exit;


    
?>
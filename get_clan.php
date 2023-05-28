<?php 
    /******************************************
        Ritorno le info del clan richiesto
    *****************************************/

    require_once 'token.php';

    if (isset($_POST['clan_tag'])) {
        //Se è settato il clan_tag, vuol dire che siamo nella ricerca clan
        $clan_tag = $_POST['clan_tag'];
    } else if(isset($_GET['player_clan_tag'])){
        //Se è settato il player_clan_tag, vuol dire che siamo nella ricerca clan da ricerca player
        $clan_tag = $_GET['player_clan_tag'];
    }    
    
    $url = "https://api.clashroyale.com/v1/clans/".urlencode($clan_tag);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Authorization: Bearer ' . $token
    ));
    $res = curl_exec($ch);
    curl_close($ch);
    $clan_info = json_decode($res, true);
    if (isset($clan_info["reason"])) {
        $response = array("exists" => false);
          echo json_encode($response);
          exit;
    }
    $clan_info["exists"] = true;


    $url = 'https://royaleapi.github.io/cr-api-data/json/alliance_badges.json';
    $badges = file_get_contents($url);
    if ($badges === false) {
        // Si è verificato un errore durante il recupero del JSON
        $response = array("exists" => false);
        echo json_encode($response);
        exit;
    } else {
        // Il JSON è stato recuperato con successo
        $data = json_decode($badges, true);
        $clanBadgeId = $clan_info["badgeId"];
        foreach ($data as $badge) {
            if ($badge["id"] == $clanBadgeId) {
                $badgeName = $badge["name"];
                $clan_info["clanLogo"] = $badgeName;
                break;
            }
        }
    }

    echo json_encode($clan_info);


    
?>
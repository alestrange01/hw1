<?php

    /*****************************************************
        Prendo le info della carta richiesta dal DB
    ******************************************************/
    require_once 'dbconfig.php';
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']);
    $card = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "SELECT * FROM cards WHERE id = '$card'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    //restituisco il json che contiene le informazioni della carta
    //Card(id, Name, Cost, Health_shield, Damage, Hit_Speed, Dps, Spawn_Death_Damage, Attack_Range, Spawn_Count)
    $entry = mysqli_fetch_assoc($res);
   
    echo json_encode(array('id' => $entry['id'], 
                            'name' => $entry['Name'], 
                            'cost' => $entry['Cost'], 
                            'health_shield' => $entry['Health_Shield'], 
                            'damage' => $entry['Damage'], 
                            'hit_speed' => $entry['Hit_Speed'], 
                            'dps' => $entry['Dps'], 
                            'spawn_death_damage' => $entry['Spawn_Death_Damage'], 
                            'attack_range' => $entry['Attack_Range'], 
                            'spawn_count' => $entry['Spawn_Count']));
    mysqli_free_result($res);
    mysqli_close($conn);
?>
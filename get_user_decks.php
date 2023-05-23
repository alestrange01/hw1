<?php

    require_once 'auth.php';
    require_once 'dbconfig.php';

    header('Content-Type: application/json');

    if (!$userid = checkAuth()) {
        header('Location: login.php');
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']) or die(mysqli_error($conn));

    $query = "SELECT * FROM deck WHERE user = $userid";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) == 0) {
        echo json_encode(array('status' => 'empty'));
        exit;
    }

    $decks = array('status' => 'ok', 'decks' => array());
    while($row = mysqli_fetch_assoc($res)) {
        //prendo l'array delle carte associate al deck
        $query = "SELECT card FROM composizione WHERE deck = " . $row['id'];
        $res2 = mysqli_query($conn, $query);
        $cards = array();
        while($row2 = mysqli_fetch_assoc($res2)) {
            $cards[] = $row2['card'];
        }
        
        $deck = array('id' => $row['id'], 'title' => $row['title'], 'cards' => $cards);
        $decks['decks'][] = $deck;    
    }

    echo json_encode($decks);
    mysqli_close($conn);

?>
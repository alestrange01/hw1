<?php

    require_once 'auth.php';
    require_once 'dbconfig.php';

    header('Content-Type: application/json');

    if (!$userid = checkAuth()) {
        header('Location: login.php');
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']) or die(mysqli_error($conn));

    $deckid = mysqli_real_escape_string($conn, $_GET['deckid']);

    $query = "DELETE FROM card_deck WHERE deck_id = $deckid";
    $res = mysqli_query($conn, $query); 

    if (mysqli_affected_rows($conn) > 0) {
        $query = "DELETE FROM decks WHERE id = $deckid";
        $res = mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) == 0) {
            echo json_encode(array('status' => 'error'));
            exit;
        }
        echo json_encode(array('status' => 'ok'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
    mysqli_close($conn);





?>
<?php

    require_once 'auth.php';
    require_once 'dbconfig.php';

    header('Content-Type: application/json');

    if (!$userid = checkAuth()) {
        header('Location: login.php');
        exit;
    }



    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']) or die(mysqli_error($conn));

    $userid = mysqli_real_escape_string($conn, $userid);
    $title = mysqli_real_escape_string($conn, $_GET['deckname']);
    $deckid = mysqli_real_escape_string($conn, $_GET['deckid']);

    //controllo che l'utente non abbia gia salvato un deck con lo stesso titolo
    $query = "SELECT * FROM decks WHERE user = '$userid' AND title = '$title'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($res) > 0){
        echo json_encode(array('status' => 'error', 'error' => 'title'));
        exit;
    }

    $conn->autocommit(false); //Disabilito l'autocommit per avviare la transazione

    $query = "UPDATE decks SET title = '$title' WHERE id = '$deckid'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if($res){
            $conn->commit(); // Eseguo la transazione
            echo json_encode(array('status' => 'ok'));
    }
    else{
        $conn->rollback(); // Annullo la transazione
        echo json_encode(array('status' => 'error', 'error' => 'query'));
    }
    $conn->autocommit(true); // Riabilito l'autocommit dopo la transazione
    mysqli_close($conn); // Chiudo la connessione col database
    






?>
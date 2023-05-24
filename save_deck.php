<?php

    require_once 'auth.php';
    if (!$userid = checkAuth()){
        echo json_encode(array('status' => 'error', 'redirect' => 'login.php'));
        exit;
    }


    save_deck();

    function save_deck(){
        global $userid, $dbconfig;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']) or die(mysqli_error($conn));

        $userid = mysqli_real_escape_string($conn, $userid);
        $title = mysqli_real_escape_string($conn, $_POST['title']);

        //controllo che l'utente non abbia gia salvato un deck con lo stesso titolo
        $query = "SELECT * FROM decks WHERE user = '$userid' AND title = '$title'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0){
            echo json_encode(array('status' => 'error', 'error' => 'title'));
            exit;
        }
        //controllo che l'utente non abbia gia salvato un deck con le stesse carte
        $cards = $_POST['cards'];
        $cards = json_decode($cards, true);

        // Escape dei valori dell'array $cards e aggiunta delle virgolette singole
        $escapedCards = array_map(function($card) use ($conn) {
                                    return "'" . mysqli_real_escape_string($conn, $card) . "'";
                        }, $cards);
        $placeholders = implode(',', $escapedCards);


        $query = "SELECT d.id FROM Decks AS d INNER JOIN Compositions AS c ON d.id = c.deck WHERE c.card IN ($placeholders) AND d.user = '$userid' GROUP BY d.id HAVING COUNT(DISTINCT c.card) = " . count($cards); 
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0){
            echo json_encode(array('status' => 'error', 'error' => 'cards'));
            exit;
        }


        $conn->autocommit(false); //Disabilito l'autocommit per avviare la transazione

        $query = "INSERT INTO decks (user, title) VALUES ('$userid', '$title')";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($res){
            $deckid = mysqli_insert_id($conn);
            /* $cards = $_POST['cards']; 
            $cards = json_decode($cards, true); */
            $success = true;
            foreach($cards as $card){
                $card = mysqli_real_escape_string($conn, $card);
                $query = "INSERT INTO Compositions (deck, card) VALUES ('$deckid', '$card')";
                $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
                if(!$res){
                    $success = false;
                    break;
                }
            }
            if ($success) {
                $conn->commit(); // Eseguo la transazione
                echo json_encode(array('status' => 'success', 'deckid' => $deckid, 'redirect' => 'my_decks.php'));
            } else {
                $conn->rollback(); // Annullo la transazione
                echo json_encode(array('status' => 'error', 'error' => 'rollback'));
            }        
        }
        else{
            echo json_encode(array('status' => 'error', 'error' => 'query'));
        }
        $conn->autocommit(true); // Riabilito l'autocommit dopo la transazione
        mysqli_close($conn); // Chiudo la connessione col database
    }






?>
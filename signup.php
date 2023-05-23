<?php
    require_once 'auth.php';
    require_once 'token.php';

    if(checkAuth()) {
        header('Location: loggedhome.php');
        exit;
    }

    // Verifico l'esistenza di dati POST
    if (!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["player_tag"]) && !empty($_POST["email"]) && 
        !empty($_POST["password"]) && !empty($_POST["confirm_password"]))
    {

        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']) or die(mysqli_error($conn));


        // CONTROLLO NOME
        if (!preg_match('/^[a-zA-Z]{2,25}+$/', $_POST['name'])) {
            $error[] = "Nome non valido";
        }
        // CONTROLLO COGNOME
        if (!preg_match('/^[a-zA-Z]+$/', $_POST['surname'])) {
            $error[] = "Cognome non valido";
        }

        // CONTROLLO PASSWORD: deve contenere almeno una minuscola, una maiuscola e un carattere speciale
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[!#\$%&@()*\+,.\-:;=\?\[\]_{|}])[A-Za-z\d!#\$%&@()*\+,.\-:;=\?\[\]_{|}]{8,}$/', $_POST['password'])) {
            $error[] = "Password con almeno una: minuscola, maiuscola e carattere speciale";
        }
        // CONTROLLO CONFERMA PASSWORD
        if (strcmp($_POST['password'], $_POST['confirm_password']) != 0) {
            $error[] = "Le password non coincidono";
        }

        // CONTROLLO EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            //filter_var è una funzione che filtra una variabile con un filtro specificato, in questo caso FILTER_VALIDATE_EMAIL
            //che serve a validare un indirizzo email secondo la RFC 822 (https://www.php.net/manual/en/filter.filters.validate.php)
            $error[] = "Email non valida";
        }else{
            //controllo che l'email non sia già in uso
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $query = "SELECT email FROM user WHERE email = '$email'";
            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già in uso";
            }
        }

        // CONTROLLO PLAYER TAG: deve iniziare con un carattere '#'
        if (!preg_match('/^#/', $_POST['player_tag'])) { 
            $error[] = "Il player tag deve iniziare con un carattere '#'.";
        }else{
            //controllo che il player tag non sia già in uso
            $player_tag = mysqli_real_escape_string($conn, $_POST['player_tag']);
            $query = "SELECT player_tag FROM user WHERE player_tag = '$player_tag'";
            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Player tag già in uso";
            }else
            {

                //controllo che il tag sia valido: uso l'API di Clash Royale
                $url = "https://api.clashroyale.com/v1/players/". urlencode($_POST['player_tag']);
                $ch = curl_init($url);
                // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Accept: application/json',
                    'Authorization: Bearer ' . $token
                ));
                $res = curl_exec($ch);
                curl_close($ch);
                $res = json_decode($res, true);
                if(isset($res['reason'])){
                    //se il tag non è valido, la chiave 'reason' è settata
                    $error[] = "Player tag non valido";
                }else{
                    //prelevo l'username dell'utente
                    $username = $res['name'];
                }
                
            }
        }
        
        

        
        

        // Se non ci sono errori procedo con l'inserimento nel database
        if (count($error) == 0) {
            $player_tag = mysqli_real_escape_string($conn, $_POST['player_tag']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);
            $username = mysqli_real_escape_string($conn, $username);

            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);
            //password_hash è una funzione che permette di criptare la password, in questo caso con l'algoritmo bcrypt
            //https://www.php.net/manual/en/function.password-hash.php
            $query = "INSERT INTO user(player_tag, name, surname, username, email, password) VALUES('$player_tag', '$name', '$surname', '$username', '$email', '$password')";

            

            if (mysqli_query($conn, $query)) {
                $_SESSION["user_id"] = mysqli_insert_id($conn);
                $_SESSION["user_tag"] = $player_tag;
                $_SESSION["username"] = $username;
                header("Location: loggedhome.php");
                mysqli_close($conn);
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        
        mysqli_close($conn);
    }
    else if (isset($_POST["name"]) || isset($_POST["surname"]) || isset($_POST["player_tag"]) || 
            isset($_POST["email"]) || isset($_POST["password"]) || isset($_POST["confirm_password"]))
            {
                
                $error[] = "Compila tutti i campi";
            }

?>




<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>StrangeRoyaleSignUp</title>
      <link rel="stylesheet" href="signup.css"/>
      <link rel="stylesheet" href="footer.css">
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
      <script src="signup.js" defer="true"></script>
    </head>

    <body>
        <header>
            <img src="images/crown.png" alt="logo" id="logo">	
            <h1 id="logotitle">StrangeRoyale</h1>
            <p id="logosubtitle">play, have fun, compete</p>
        </header>


        <div class="form-box">
            <form class="form" name='signup' method='post' autocomplete='off'>
            <span class="title">Welcome</span>
                <span class="subtitle">Sign up to <a href="http://localhost/hw4/home.php">StrangeRoyale</a></span>
                <div class="form-container">
                    <input id="name" type="text" class="input" name="name" placeholder="Name" value="" <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?>>
                    <input id="surname" type="text" class="input"  name="surname" placeholder="Surname"  value="" <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?>>
                    <input id="player_tag" type="text" class="input" name="player_tag" placeholder="Player Tag" value="" <?php if(isset($_POST["player_tag"])){echo "value=".$_POST["player_tag"];} ?>>
                    <input id="email" type="email" class="input" name="email" placeholder="Email" value="" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <input id="password" type="password" class="input" name="password" placeholder="Password" value=""<?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <input id="confirm_password" type="password" class="input" name="confirm_password" placeholder="Confirm Password" value="">
                </div>
                <?php 
                    
                    if(isset($error)) {
                        echo "<div class='errors'>";
                        foreach($error as $e) {
                            echo "<div class='error'><img src='images/cross.png'/><span>".$e."</span></div>";
                        }
                        echo "</div>";
                    }
                ?>
                <div class="errors">
                    <div id="error_name" class='error hidden'><img src='images/cross.png'/><span>Nome non valido</span></div>
                    <div id="error_surname" class='error hidden'><img src='images/cross.png'/><span>Cognome non valido</span></div>
                    <div id="error_player_tag" class='error hidden'><img src='images/cross.png'/><span></span></div>
                    <div id="error_email" class='error hidden'><img src='images/cross.png'/><span></span></div>
                    <div id="error_password" class='error hidden'><img src='images/cross.png'/><span>Password con almeno una: minuscola, maiuscola e carattere speciale</span></div>
                    <div id="error_confirm_password" class='error hidden'><img src='images/cross.png'/><span>Le password non coincidono</span></div>
                    <div id="error_form" class='error hidden'><img src='images/cross.png'/><span>Compila tutti i campi</span></div>
                </div>
                
                
                <div class="submit">
                    <input type='submit' value="Sign Up" id="submit">
                </div>
            </form>
            <div class="form-section">
                <p>Have an account? <a href="http://localhost/hw4/login.php">Log in</a></p>
            </div>
        </div>

        <section id="how-to-player-tag">
                <div class="tagtitle"><p>Come trovare il tuo tag giocatore</p></div>
                <div class="taghowto">
                    <span class="box">
                        <img src="images/pt-home.jpg" alt="">
                        <p>1. Seleziona il nome del giocatore</p>
                    </span>
                    <span class="box">
                        <img src="images/pt-profile.jpg" alt="">
                        <p>2. Seleziona il tag del giocatore</p>
                    </span>
                    <span class="box">
                        <img src="images/pt-copy.jpg" alt="">
                        <p>3. Copia il tag</p>
                    </span>
                </div>
        </section>

        <footer>
            <nav>
              <div class="footer-container">
                <div class="footer-column">
                    <strong>StrangeRoyale</strong>
                    <p>Alessandro Strano</p>
                    <p>1000015308</p>
                </div>
                <div class="footer-column">
                    <strong>Aiuto</strong>
                    <p>Chi siamo</p>
                    <p>FAQ</p>
                    <p>Richieste Commerciali</p>
                    <p>Richieste Funzionalità</p>
                    <p>Politica Privacy</p>
                    <p>Termini di Servizio</p>
                </div>
                <div class="footer-column logos">
                    <strong>Social</strong>
                    <div>
                        <img src="images/twitter.svg" alt="">
                        <img src="images/facebook.svg" alt="">
                        <img src="images/instagram.svg" alt="">
                        <img src="images/youtube.svg" alt="">
                        <img src="images/github.svg" alt="">
                        <img src="images/reddit.svg" alt="">
                        <img src="images/discord.svg" alt="">
                    </div>
                </div>
              </div>
            </nav>
        </footer>


    </body>
</html>
<?php

    // Verifica che l'utente sia già loggato, in caso positivo lo reindirizzo alla home
    include 'auth.php';
    if (checkAuth()) {
        header('Location: loggedhome.php');
        exit;
    }

    if(!empty($_POST["email_tag"]) && !empty($_POST["password"])) {
        // Se sono qui vuol dire che l'utente ha inviato il form
        // Verifico che i dati siano stati inviati correttamente usando la funzione checkAuth definita nel file auth.php
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']) or die(mysqli_error($conn));

        $email_tag = mysqli_real_escape_string($conn, $_POST['email_tag']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Permette l'accesso sia inserendo l'email che il player tag: entrambi sono univoci e devono corrisspondere alla stessa password
        $query = "SELECT * FROM user WHERE email = '$email_tag' OR player_tag = '$email_tag'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {
                // Imposto una sessione
                $_SESSION["user_id"] = $entry['id'];
                $_SESSION["user_tag"] = $entry['player_tag'];
                $_SESSION["username"] = $entry['username'];
                header("Location: loggedhome.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }

        // Se l'utente non è loggato mando un messaggio di errore
        $error = "Email/player tag e/o password non corrispondono";
    }
    else if (isset($_POST["email_tag"]) || isset($_POST["password"])) {
        // Se l'utente ha inviato uno solo dei due campi, mando un messaggio di errore
        $error = "Inserisci email/player tag e password";
    }
?>





<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>StrangeRoyaleSingIn</title>
      <link rel="stylesheet" href="signup.css"/>
      <link rel="stylesheet" href="footer.css">
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
      <script src="login.js" defer="true"></script>
    </head>

    <body>
        <header>
            <img src="images/crown.png" alt="logo" id="logo">	
            <h1 id="logotitle">StrangeRoyale</h1>
            <p id="logosubtitle">play, have fun, compete</p>
        </header>

        <?php
            /* echo "<pre>";
            echo '<h1>Variabile $_POST</h1>';
            print_r($_POST); 
            echo "</pre>"; */
        ?>


        <div class="form-box">
            <form class="form" method='post' name='login'>
            <span class="title">Welcome</span>
                <span class="subtitle">Log into <a href="http://localhost/hw4/home.php">StrangeRoyale</a></span>
                <div class="form-container">
                    <input type="text" class="input" name='email_tag' placeholder="Email or Player Tag" <?php if(isset($_POST["email_tag"])){echo "value=".$_POST["email_tag"];} ?>>
                    <input type="password" class="input" name='password' placeholder="Password">
                </div>
                <?php 
                    if(isset($error)) {
                        echo "<div class='errors'>";
                        echo "<div class='error'><img src='images/cross.png'/><span>".$error."</span></div>";
                        echo "</div>";
                    }
                ?>
                <div class="errors">
                    <div id="error_form" class='error hidden'><img src='images/cross.png'/><span>Inserisci email/player tag e password</span></div>
                </div>
                <div class="submit">
                    <input type='submit' value="Log In" id="submit">
                </div>
                <p>Not a member? <a href="http://localhost/hw4/signup.php">Sign Up</a></p>
            </form>
            <div class="form-section">
                <a href="">Forgot password?</a> 
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
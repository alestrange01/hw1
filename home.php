<?php 
    require_once 'auth.php';
    if ($userid = checkAuth()) {
        header("Location: loggedhome.php");
        exit;
    }
?>



<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StrangeRoyale</title>
        <link rel="stylesheet" href="home.css"/>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="footer.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
        <script src="burger-menu.js" defer="true"></script>
    </head>

    <body>
                
        <nav id="navigation-bar">
            <div id="logodiv">
                <img src="images/crown.png" alt="logo" id="logo">	
                <h1 id="logotitle">StrangeRoyale</h1>
                <p id="logosubtitle">play, have fun, compete</p>
            </div>
            <a href='http://localhost/hw4/home.php'><u>Home</u></a>
            <a href='http://localhost/hw4/deck_creator.php'>Deck Creator</a>
            <a href='http://localhost/hw4/players.php'>Players</a>
            <a href='http://localhost/hw4/clans.php'>Clans</a>
            <a href='http://localhost/hw4/login.php'>Log in</a>
            <button><a href='http://localhost/hw4/signup.php'> Sign Up </a></button>
        </nav>
        
        <header id="sopra">
            <div id="overlay"> </div>
            <p>Benvenuto in StrangeRoyale!</p>
        </header>

        <div id="burger-menu">
            <label for="burger">
                <input type="checkbox" id="burger">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>  
        <div id="burger-menu-links">
            <a href="http://localhost/hw4/home.php"><img src="images/home.svg" alt=""></a>
            <a href="http://localhost/hw4/deck_creator.php"><img src="images/deck_creator.svg" alt=""></a>
            <a href="http://localhost/hw4/players.php"><img src="images/players.svg" alt=""></a>
            <a href="http://localhost/hw4/clans.php"><img src="images/clans.svg" alt=""></a>
            <a href="http://localhost/hw4/login.php"><img src="images/login.svg" alt=""></a>
            <a href="http://localhost/hw4/signup.php"><img src="images/signup.svg" alt=""></a>
        </div>

        <article id="menu">

            <div class='menu-element'>
                <div class='text'>
                    Benvenuto nel mio sito dedicato a Clash Royale, il popolare gioco di strategia sviluppato da Supercell.
                    Qui puoi trovare tutto ciò che ti serve per creare il tuo deck personalizzato, consultare le informazioni
                    sulle carte, i giocatori e i clan.
                </div>
                <img src="images/stemmatrasp.png">
            </div>
            <button class="registration"> <a href='http://localhost/hw4/signup.php'> Join the Community </a></button>  
            <div class='menu-element'>
                <div class='text'>
                    Quì avrai la possibilità di salvare le tue creazioni e modificarle a tuo piacimento. 
                    Scopri tutto ciò che c'è da sapere su Clash Royale e divertiti a giocare come mai prima d'ora!
                </div>
                <img src="images/War_Shield.webp">
            </div>

        </article>

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

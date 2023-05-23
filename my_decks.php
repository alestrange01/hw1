<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
    // Se il controllo è passato, vuol dire che l'utente è loggato
?>
        


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StrangeRoyale</title>
        <link rel="stylesheet" href="home.css"/>
        <link rel="stylesheet" href="my_decks.css">
        <link rel="stylesheet" href="player_clan_stats.css"/>
        <link rel="stylesheet" href="deck_creator.css"/>
        <link rel="stylesheet" href="navbar.css"/>
        <link rel="stylesheet" href="footer.css"/>
        <link rel="stylesheet" href="loading.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
        <script src="my_decks.js" defer="true"></script>
        <script src="burger-menu.js" defer="true"></script>
       
    </head>

    <body class="background">
        <nav id="navigation-bar">
            <div id="logodiv">
                <img src="images/crown.png" alt="logo" id="logo">	
                <h1 id="logotitle">StrangeRoyale</h1>
                <p id="logosubtitle">play, have fun, compete</p>
            </div>
            <a href='http://localhost/hw4/home.php'>Home </a>
            <a href='http://localhost/hw4/deck_creator.php'>Deck Creator</a>
            <a href='http://localhost/hw4/players.php'>Players</a>
            <a href='http://localhost/hw4/clans.php'>Clans</a>
            <a href='http://localhost/hw4/my_decks.php'><u>My decks</u></a>
            <button><a href='logout.php'> Log Out </a></button>
        </nav>
        
        <header id="sopra">
            <div id="overlay"> </div>
            <!-- benvenuto personalizzato -->
            <p id="benvenuto"><?php echo $_SESSION['username']?>'s decks</p>
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
            <a href="http://localhost/hw4/my_decks.php"><img src="images/my_decks.svg" alt=""></a>
            <a href="logout.php"><img src="images/logout.svg" alt=""></a>
        </div>

        <div id="loading">
            <span>loading</span>
            <div class="words">
                <span class="word">player</span>
                <span class="word">stats</span>
                <span class="word">cards</span>
                <span class="word">info</span>
            </div>
        </div>

        <article id="modale" class="hidden"> 
		
		</article>

        <article id="menu" class="hidden">
            <div id="first_deck" class='menu-element hidden'>
                <div class='text'>
                    Sei pronto a scoprire tutto il divertimento e la strategia dietro al gioco? 
                    Crea il tuo primo mazzo personalizzato e inizia subito a giocare! I mazzi ti consentono di mettere insieme le carte che preferisci, creando una strategia unica e affascinante. 
                    Scegli le tue carte preferite, assemblale in un mazzo e sperimenta il brivido di combattere contro avversari formidabili. 
                    Non perdere l'opportunità di dimostrare le tue abilità! Clicca qui per creare il tuo primo mazzo e immergiti nell'emozionante mondo del gioco.
                </div>
                <img src="images/cards.webp">
            </div>
            <button class="registration"> <a href='http://localhost/hw4/deck_creator.php'> Crea un nuovo deck </a></button>  
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

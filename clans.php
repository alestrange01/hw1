<?php
	require_once 'get_navbar.php';
?> 


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StrangeRoyale</title>
        <link rel="stylesheet" href="home.css"/>
        <link rel="stylesheet" href="player_clan_stats.css"/>
        <link rel="stylesheet" href="search_bar.css"/>
        <link rel="stylesheet" href="navbar.css"/>
        <link rel="stylesheet" href="footer.css"/>
        <link rel="stylesheet" href="loading.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
        <script src="onPlayerJson.js"></script>
        <script src="clans.js" defer="true"></script>
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
            <a href=''><u>Clans</u></a>
            <a href='<?php echo $link1; ?>'><?php echo $text1; ?></a>
            <button><a href='<?php echo $link2; ?>'><?php echo $text2; ?></a></button>
        </nav>
        
        <header id="sopra">
            <div id="overlay"> </div>
            <!-- benvenuto personalizzato -->
            <!-- <p id="benvenuto">Benvenuto <?php //echo $_SESSION['username']?> su StrangeRoyale!</p> -->
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
            <a href="<?php echo $link1; ?>"><img src="<?php echo $img1; ?>" alt=""></a>
            <a href="<?php echo $link2; ?>"><img src="<?php echo $img2; ?>" alt=""></a>
        </div>

        <div id="intro">Discover all the clans around the world!</div>

        <div class="container-input">
        <form>
            <input type="submit" id="submit">
            <input type="text" placeholder="Search Clan" name="clan_tag" id="input" <?php if(isset($_GET["player_clan_tag"])){echo "value=".$_GET["player_clan_tag"];} ?>>
        </form>
        </div>

        <div id="loading" class="hidden">
            <span>loading</span>
            <div class="words">
                <span class="word">clan</span>
                <span class="word">stats</span>
                <span class="word">players</span>
                <span class="word">cards</span>
            </div>
        </div>

        <div id="error" class="hidden">
            <span>Clan not found</span>
        </div>

        <article id="menuPlayer" class="infoMenu hidden">
            <div id="playerInfo">
                <div id="name" class="info"></div>
                <img id="clanLogo" src="" alt="">
                <div id="tag" class="info"></div>
                <div id="type" class="info"></div>
                <div id="clanWarTrophies" class="info"><span></span><img src="images/cw-trophy.webp" alt="" class="trophy"></div>
                <div id="description" class="info"></div>  
            </div>

            <div id="stats">
                <div id="location" class="info"></div>
                <div id="clanScore" class="info"></div>
                <div id="requiredTrophies" class="info"><span></span><img src="images/trophy.webp" alt="" class="trophy"></div>
                <div id="donationsPerWeek" class="info"></div>
                <div id="membersCount" class="info"></div>
            </div>
            <p class="statsTitle">Members of the Clan</p>
            <div id="members"></div>
            
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

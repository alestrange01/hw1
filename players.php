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
        <script src="players.js" defer="true"></script>
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
            <a href=''><u>Players</u></a>
            <a href='http://localhost/hw4/clans.php'>Clans</a>
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

        <div id="intro">Discover all the player around the world!</div>      

        <div class="container-input">
        <form>
            <input type="submit" id="submit">
            <input type="text" placeholder="Search Player" name="player_tag" id="input" <?php if(isset($_GET["clan_player_tag"])){echo "value=".$_GET["clan_player_tag"];} ?>>
        </form>
        </div>

        <div id="loading" class="hidden">
            <span>loading</span>
            <div class="words">
                <span class="word">player</span>
                <span class="word">stats</span>
                <span class="word">cards</span>
                <span class="word">clan</span>
            </div>
        </div>

        <div id="error" class="hidden">
            <span>Player not found</span>
        </div>

        <article id="menuPlayer" class="infoMenu hidden">
            <div id="playerInfo">
                <div id="name" class="info"></div>
                <div id="tag" class="info"></div>
                <div id="level" class="info"></div>
                <div id="trophy" class="info"><span></span><img src="images/trophy.webp" alt="" class="trophy"></div>
                <div id="clan" class="info"></div>  
            </div>

            <div id="stats">
                <div id="arena" class="info"></div>
                <div id="maxTrophies" class="info"><span></span><img src="images/trophy.webp" alt="" class="trophy"></div>
                <div id="starPoints" class="info"></div>
                <div id="expPoints" class="info"></div>
                <div id="totalExpPoints" class="info"></div>
                <div id="battleCount" class="info"></div>
                <div id="wins" class="info"></div>
                <div id="losses" class="info"></div>
                <div id="draws" class="info"></div>
                <div id="winrate" class="info"></div>
                <div id="threeCrownWins" class="info"></div>
                <div id="totalDonations" class="info"></div>
                <div id="challengeMaxWins" class="info"></div>
                <div id="tournamentCardsWon" class="info"></div>
                <div id="tournamentBattleCount" class="info"></div>
            </div>
            <p class="statsTitle">Achievement Badges</p>

            <div id="badges"></div>

            <p class="statsTitle">Most Used Card</p>
            <div id="mostUsedCard"></div>

            <p class="statsTitle">Upcoming Chests</p>
            <div id="upcomingChests"></div>


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

<?php
	require_once 'get_navbar.php';
?> 

<html>

	<head>
		<title>StrangeRoyale</title>
		<meta charset="utf-8">
		<link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-down-r.css' rel='stylesheet'>		
        <link rel="stylesheet" href="navbar.css">
		<link rel="stylesheet" href="deck_creator.css"/>
		<link rel="stylesheet" href="footer.css"/>
        <link rel="stylesheet" href="loading.css"/>
		<script src="deck_creator.js" defer="true"></script>
        <script src="burger-menu.js" defer="true"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">	</head>
	
	<body>
		<nav id="navigation-bar">
            <div id="logodiv">
                <img src="images/crown.png" alt="logo" id="logo">	
                <h1 id="logotitle">StrangeRoyale</h1>
                <p id="logosubtitle">play, have fun, compete</p>
            </div>
            <a href='http://localhost/hw4/home.php'>Home</a>
            <a href=''><u>Deck Creator</u></a>
            <a href='http://localhost/hw4/players.php'>Players</a>
            <a href='http://localhost/hw4/clans.php'>Clans</a>
            <a href='<?php echo $link1; ?>'><?php echo $text1; ?></a>
            <button><a href='<?php echo $link2; ?>'><?php echo $text2; ?></a></button>
        </nav>

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

        <div id="bloccologo">
            <img src="images/crown.png" alt="logo" id="logobloccologo">	
            <h1 id="bloccologotitle">StrangeRoyale</h1>
            <p id="bloccologosubtitle">play, have fun, compete</p>
        </div>


			
		<div id="intro" class="hidden">Crea il tuo deck: seleziona 8 carte <br> Ordine le carte per rarità</div>
        <div class="container hidden">
            <div>
                <label><input type="radio" name="order" value="up"><span>Crescente</span></label>
                <label><input type="radio" name="order" value="down"><span>Decrescente</span></label>
			</div>
			<div>
                <label><input type="radio" name="order" value="common"><span>Comuni</span></label>
                <label><input type="radio" name="order" value="rare"><span>Rare</span></label>
                <label><input type="radio" name="order" value="epic"><span>Epiche</span></label>
                <label><input type="radio" name="order" value="legendary"><span>Leggendarie</span></label>
                <label><input type="radio" name="order" value="hero"><span>Eroi</span></label>
			</div>
        </div>

        <div id="loading" class="bassa">
            <span>loading</span>
            <div class="words">
                <span class="word">cards</span>
                <span class="word">stats</span>
                <span class="word">players</span>
                <span class="word">clan</span>
            </div>
        </div>

		<article id="album-view">
			
			
		</article>

		<article id="modale" class="hidden"> 
		
		</article>
		
		<div class="gg-arrow-down-r hidden" id="arrow-down"></div>
	
		<div id="deck" class="hidden">
            <div></div>
        </div>

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

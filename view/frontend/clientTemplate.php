<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?= $title ?></title>
        
        <link href="/projet-4/public/css/style.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Aguafina+Script&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="Public/css/img/favicon.png">

        <?= $head ?>
    </head>
        
    <body>
    	<header>
    		<div class="header-title">
    			<h1>Billet simple pour l'Alaska</h1>
    		    <h2 class="responsive-none">Par Jean Forteroche</h2>
    		</div>
    		<nav class="menu grid">
    			<ul>
    				<li><a class="menu-item" href="index.php">Accueil</a></li>
                    <li><a class="menu-item" href="index.php?action=listPosts">Les épisodes</a></li>
                    <li><a class="menu-item" href="index.php?action=lastEpisode">Le dernier épisode</a></li>
    			</ul>
    		</nav>
            <div class="menu-burger">
                <input type="checkbox" class="toggler">
                <div class="hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <ul class="menu-mobile">
                    <li><a class="menu-item" href="index.php">Accueil</a></li>
                    <li><a class="menu-item" href="index.php?action=listPosts">Les épisodes</a></li>
                    <li><a class="menu-item" href="index.php?action=lastEpisode">Dernier épisode</a></li>
                </ul>
            </div>
    	</header>
        <?= $content ?>
        <footer class="client-footer">
            <p class="footer-content">&copy; 2019 Jean Forteroche . <a href="view/frontend/rgpd.html">RGPD</a> . <a href="view/frontend/legalNotice.html">Mentions légales</a> . <a href="index.php?action=login">Admin</a></p>
        </footer>
    </body>
</html>
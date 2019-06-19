<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <?= $head ?>
    </head>
        
    <body>
    	<header>
    		<div class="header-title">
    			<h1>Billet simple pour l'Alaska</h1>
    		    <h2>Par Jean Forteroche</h2>
    		</div>
    		<nav class="menu grid">
    			<ul>
    				<li><a class="menu-item" href="index.php">Accueil</a></li>
                    <li><a class="menu-item" href="index.php?action=listPosts">Liste des épisodes</a></li>
                    <li><a class="menu-item" href="index.php?action=lastEpisode">Dernier épisode</a></li>
    				<li><a class="menu-item" href="index.php?action=login">Admin</a></li>
    			</ul>
    		</nav>
    	</header>
        <?= $content ?>
    </body>
</html>
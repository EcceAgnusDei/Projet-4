<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Administration</title>
	
	<link href="public/css/style.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Aguafina+Script&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="Public/css/img/favicon.png">

	<?= $head ?>
</head>  
<body>
	<header class="header-admin">
		<div class="header-title">
			<h1 class="responsive-none">Bienvenue sur l'interface d'administration de votre site, Mr Forteroche !</h1>
			<h2 class="responsive-none">Que souhaitez-vous faire ?</h2>
			<p>Bienvennue, Mr Forteroche</p>
		</div>
		<nav class="menu grid">
			<ul>
				<li><a href="admin.php?action=postadmin" class="menu-item">Mes articles</a></li>
				<li><a href="admin.php?action=commentadminbyid" class="menu-item">Commentaires</a></li>
				<li><a href="admin.php?action=newpost" class="menu-item">Nouvel article</a></li>
				<li><a href="index.php" class="menu-item">Accueil</a></li>
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
				<li><a href="admin.php?action=postadmin" class="menu-item">Mes articles</a></li>
				<li><a href="admin.php?action=commentadminbyid" class="menu-item">Commentaires</a></li>
				<li><a href="admin.php?action=newpost" class="menu-item">Nouvel article</a></li>
				<li><a href="index.php" class="menu-item">Accueil</a></li>
			</ul>
		</div>
	</header>
	<?= $contentAdmin ?>
	<footer class="client-footer">
		<p class="footer-content">&copy; Jean Forteroche . <a href="view/frontend/rgpd.html">RGPD</a> . <a href="view/frontend/legalNotice.html">Mentions légales</a> . <a href="admin.php?action=logout">Déconnexion</a></p>
	</footer>
</body>
</html>


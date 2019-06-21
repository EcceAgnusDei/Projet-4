<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Administration</title>
	<link href="public/css/style.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Aguafina+Script&display=swap" rel="stylesheet">

	<?= $head ?>
</head>  
<body>
	<header class="header-admin">
		<div class="header-title">
			<h1>Bienvenue sur l'interface d'administration de votre site, Mr Forteroche !</h1>
			<h2>Que souhaitez-vous faire ?</h2>
			<h2 class="responsive-title">Bienvennue, Mr Forteroche</h2>
		</div>
		<nav class="menu grid">
			<ul>
				<li><a href="admin.php?action=postadmin" class="menu-item">Mes articles</a></li>
				<li><a href="admin.php?action=commentadminbyid" class="menu-item">Commentaires</a></li>
				<li><a href="admin.php?action=newpost" class="menu-item">Nouvel article</a></li>
				<li><a href="index.php" class="menu-item">Accueil</a></li>
				<li><a href="admin.php?action=logout" class="menu-item">Déconnexion</a></li>
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
				<li><a href="admin.php?action=logout" class="menu-item">Déconnexion</a></li>
			</ul>
		</div>
	</header>
	<?= $contentAdmin ?>
</body>
</html>


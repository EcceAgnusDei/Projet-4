<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<header>
	<h1>Bienvenue sur l'interface d'administration de votre site, Mr Forteroche</h1>
	<nav>
		<ul>
			<li><a href="admin.php?action=postadmin">Gérer vos articles</a></li>
			<li><a href="admin.php?action=commentmanager">Gérer les commentaires</a></li>
			<li><a href=""></a></li>
			<li><a href=""></a></li>
			<li><a href="admin.php?action=logout">Déconnexion</a></li>
		</ul>
	</nav>
</header>
<?= $contentAdmin ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/clientTemplate.php'); ?>


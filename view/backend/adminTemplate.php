<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<header>
	<h1>Bienvenue sur l'interface d'administration de votre site, Mr Forteroche</h1>
	<nav>
		<ul>
			<li><a href="index.php?action=postmanager">Gérer vos articles</a></li>
			<li><a href="index.php?action=commentmanager">Gérer les commentaires</a></li>
			<li><a href=""></a></li>
			<li><a href=""></a></li>
			<li><a href=""></a></li>
		</ul>
	</nav>
</header>
<?= $contentAdmin ?>
<?php $content = ob_get_clean(); ?>

<?php require('../frontend/clientTemplate.php'); ?>


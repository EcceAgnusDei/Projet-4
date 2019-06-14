<?php $title = 'Authentification' ?>

<?php ob_start(); ?>
<h1>Administation</h1>
<form action="./index.php?action=identifying" method="post">
	<label for="login">Identifiant</label>
	<input type="text" name="login" id="login">
	<label for="password">Mot de passe</label>
	<input type="password" name="password" id="password">
	<input type="submit" value="Connexion">
</form>
<div><a href="index.php">Retourn à l'accueil</a></div>
<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>
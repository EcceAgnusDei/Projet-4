<?php $title = 'Authentification' ?>
<?php $head = ''; ?>
<?php ob_start(); ?>
<section class="grid">
	<h1>Administration</h1>
	<form action="./index.php?action=identifying" method="post" class="login-form">
		<label for="login">Identifiant</label>
		<input type="text" name="login" id="login">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password">
		<input type="submit" class="btn" value="Connexion">
	</form>
	<p><a href="index.php">Retourn à l'accueil</a></p>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/ClientTemplate.php'); ?>
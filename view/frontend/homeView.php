<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php $head = ''; ?>
<?php ob_start(); ?>
<section class="home-body grid">
	<h2>Bienvenue dans mon nouveau livre !</h2>
	<p>Si vous êtes las d'attendre vos prochains congés pour partir en vacance, vous êtes à la bonne adresse. En effet, j'ai décidé de vous faire partager ma dernière oeuvre sur ce blog.</p>
	<p>Suivez mon nouveau héro au travers de nouvelles péripéties publiées périodiquement.</p>
	<p>Vous pourrez même participer à ses aventures en commentant vous même les différents épisodes de cette série en prose.</p>
	<p>Bonne aventure, et bonne lecture !</p>
	<p>Jean Forteroche</p>
</section>

<?php
$content = ob_get_clean(); 
?>

<?php require('./view/frontend/clientTemplate.php'); ?>
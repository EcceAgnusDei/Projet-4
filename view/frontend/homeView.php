<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php $head = ''; ?>
<?php ob_start(); ?>
<section class="home-body">
	<div class="grid">
		<h2>Bienvenue dans mon nouveau livre !</h2>
		<div class="home-body-text">
			<div class="home-p">
				<p class="p1">Si vous êtes las d'attendre vos prochains congés pour partir en vacance, vous êtes à la bonne adresse. En effet, j'ai décidé de vous faire partager ma dernière oeuvre sur ce blog.</p>
				<img class="p1-img" src="././public/css/img/p1.png" alt="">
			</div>
			<div class="home-p">
				<img class="p2-img" src="././public/css/img/p2.jpg" alt="">
				<p class="p2">Suivez mon nouveau héro au travers de nouvelles péripéties publiées périodiquement. </br>Vous pourrez même participer à ses aventures en commentant vous même les différents épisodes de cette série en prose. </p>
			</div>
			<div class="signature home-p">
				<div class="signature-p">
					<p>Bonne aventure, et bonne lecture !</p>
					<p>Jean Forteroche</p>
				</div>
				<img class="signature-img" src="././public/css/img/signature.png" alt="">
			</div>
		</div>
	</div>
</section>

<?php
$content = ob_get_clean(); 
?>

<?php require('./view/frontend/clientTemplate.php'); ?>
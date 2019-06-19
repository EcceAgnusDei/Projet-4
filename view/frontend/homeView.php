<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php $head = ''; ?>
<?php ob_start(); ?>
<section>
	<h2>Bienvenue dans mon nouveau livre !</h2>
	
</section>

<?php
$content = ob_get_clean(); 
?>

<?php require('./view/frontend/clientTemplate.php'); ?>
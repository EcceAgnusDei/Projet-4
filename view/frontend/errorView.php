<section>
	<img src="public/css/img/error.png" alt="Erreur">
	<h2>Oups, une erreur est survenue... la voici :</h2>

	<?php 
	if(isset($errorMessage))
	{
	?>
		<p> <?= $errorMessage ?> </p>
	<?php
	}
	?>
	
	<p>Une seule solution : revenir à l' <a href="index.php">Accueil</a></p>
</section>

<?php ob_start(); ?>
<section>
	<h2>Vos derniers articles</h2>
	<?php
	while($data = $posts->fetch())
	{
	?>
	<div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['post_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
        </p>
    </div>
	<?php
	}
	?>
	<div><a href="admin.php?action=newpost">Créer un nouvel article</a></div>
	<?php
	$posts->closeCursor();
	?>
	<?php $contentAdmin = ob_get_clean(); ?>
</section>

<?php require('view/backend/adminTemplate.php'); ?>
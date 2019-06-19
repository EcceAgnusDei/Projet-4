<?php $head = ''; ?>
<?php ob_start(); ?>
<section>
	<h2>Vos derniers articles</h2>
	<?php
	while($data = $posts->fetch())
	{
	?>
	<div class="news">
        <h3>
            <?= $data['title'] ?>
            <em>le <?= $data['post_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= $data['content'] ?>
        </p>
        <ul>
        	<li><a href="admin.php?action=deletepost&amp;id=<?= $data['id']; ?>">Supprimer</a></li>
        	<li><a href="admin.php?action=updatepostview&amp;id=<?= $data['id']; ?>">Mettre à jour</a></li>
        </ul>
    </div>
	<?php
	}
	?>
	<?php $posts->closeCursor();?>
</section>
<?php $contentAdmin = ob_get_clean(); ?>

<?php require('view/backend/adminTemplate.php'); ?>
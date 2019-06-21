<?php $head = ''; ?>
<?php ob_start(); ?>
<section id="admin-posts" class="grid">
	<h2>Vos articles</h2>
	<?php
	while($data = $posts->fetch())
	{
	?>
	<div class="news" id="<?= $data['id']; ?>">
        <h3>
            <?= $data['title'] ?>
            <em>le <?= $data['post_date_fr'] ?></em>
        </h3>
        <?= $data['content'] ?>
        <div class="post-action">
        	<a href="admin.php?action=deletepost&amp;id=<?= $data['id']; ?>">Supprimer</a>
        	<a href="admin.php?action=updatepostview&amp;id=<?= $data['id']; ?>">Mettre à jour</a>
        </div>
    </div>
	<?php
	}
	?>
	<?php $posts->closeCursor();?>
</section>
<?php $contentAdmin = ob_get_clean(); ?>

<?php require('view/backend/adminTemplate.php'); ?>
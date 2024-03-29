<?php $head = ''; ?>
<?php ob_start(); ?>
<section id="admin-posts" class="grid last-section">
	<h2>Vos articles</h2>
	<p>
		<a  href="admin.php?action=newpost">Ajouter un article</a>
	</p>
	<table class="table">
	<?php
	while($data = $posts->fetch())
	{
	?>
	<tr id="<?= $data['id']; ?>">
        <th class="table-post-title">
            <a href="admin.php?action=onepostadmin&amp;id=<?= $data['id']; ?>"><?= $data['title'] ?></a>
        </th>
        <th class="table-post-date">
        	<?= $data['post_date_fr'] ?>
        </th>
        <th class="table-post-action">
        	<button class="btn" onclick='window.location.href="admin.php?action=deletepost&id=<?= $data['id']; ?>"'>Supprimer</button>
        	<a class="btn" href="admin.php?action=updatepostview&amp;id=<?= $data['id']; ?>">Mettre à jour</a>
        </th>
    </tr>
	<?php
	}
	?>
	</table>
	<?php $posts->closeCursor();?>
</section>
<?php $contentAdmin = ob_get_clean(); ?>

<?php require('view/backend/adminTemplate.php'); ?>
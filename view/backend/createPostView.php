<?php $head='<script src="https://cdn.tiny.cloud/1/5717z0njwuwpxgfqw8iux6q63r20xwd7a12keqj48wz70rrb/tinymce/5/tinymce.min.js"></script>
	<script>tinymce.init({selector:\'textarea\'});</script>' ?>

<?php
if(isset($_GET['id']))
{
?>
<?php ob_start(); ?>
<section>
	<h2>Mettez à jours votre article</h2>
	<form action="admin.php?action=updatepost&amp;id=<?= $_GET['id'] ?>" method="POST">
		<label for="title">Titre</label>
		<input type="text" name="create-title" id="create-title" required>
		<textarea name="create-content" id="create-content"require></textarea>
		<input type="submit" value="Mettre à jour">
	</form>
</section>
<?php $contentAdmin = ob_get_clean(); ?>
<?php
}
else
{
?>
<?php ob_start(); ?>
<section>
	<h2>Créez votre article</h2>
	<form action="admin.php?action=createpost" method="POST">
		<label for="title">Titre</label>
		<input type="text" name="create-title" id="create-title" required>
		<textarea name="create-content" id="create-content"require></textarea>
		<input type="submit" value="Publier">
	</form>
</section>
<?php $contentAdmin = ob_get_clean(); ?>
<?php
}
?>
<?php require('view/backend/adminTemplate.php'); ?>
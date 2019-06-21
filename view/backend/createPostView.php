<?php $head='<script src="public/js/tinymce/tinymce.min.js"></script>
	<script>tinymce.init({selector:\'textarea\', language: \'fr_FR\'});</script>' ?>

<?php
if(isset($_GET['id']))
{
?>
<?php ob_start(); ?>
<section class="grid">
	<h2>Mettez à jours votre article</h2>
	<form action="admin.php?action=updatepost&amp;id=<?= $_GET['id'] ?>" method="POST">
		<label for="title">Titre</label>
		<input type="text" name="create-title" id="create-title" value="<?=$post['title'];?>" required>
		<textarea name="create-content" id="create-content" rows="50"><?= $post['content']; ?></textarea>
		<input type="submit" value="Mettre à jour" class="btn">
	</form>
</section>
<?php $contentAdmin = ob_get_clean(); ?>
<?php
}
else
{
?>
<?php ob_start(); ?>
<section class="grid">
	<h2>Créez votre article</h2>
	<form action="admin.php?action=createpost" method="POST">
		<label for="title">Titre</label>
		<input type="text" name="create-title" id="create-title" required>
		<textarea name="create-content" id="create-content" rows="50"></textarea>
		<input type="submit" value="Publier" class="btn">
	</form>
</section>
<?php $contentAdmin = ob_get_clean(); ?>
<?php
}
?>
<?php require('view/backend/adminTemplate.php'); ?>
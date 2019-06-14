<?php $title = $post['title']; ?>

<?php ob_start();?>
<h2>Le billet du blog</h2>

<div class="news">
	<h3><?= $post['title'] ?> <em><?= $post['post_date_fr'] ?></em></h3>
	<p><?= nl2br($post['content']) ?></p>
</div>

<div><a href="index.php">Retour aux articles</a></div>

<div class="comment">
	<h2>Commentaires</h2>
	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		<div>
			<label for="author">Auteur</label><br />
			<input type="text" id="author" name="author" />
		</div>
		<div>
			<label for="comment">Commentaire</label><br />
			<textarea id="comment" name="comment"></textarea>
		</div>
		<div>
			<input type="submit" />
		</div>
	</form>
</div>

<?php
while ($data = $comments->fetch())
{
?>
<div class="comments">
	<p>
		<strong><?= htmlspecialchars($data['author']) ?></strong> le <?= $data['comment_date_fr'] ?> : <?= htmlspecialchars($data['comment']) ?>
	</p>
</div>
<?php 
}
$comments->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/clientTemplate.php'); ?>

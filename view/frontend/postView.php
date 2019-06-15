<?php $title = $post['title']; ?>

<?php ob_start();?>
<section class="news">
	<h2>Le billet du blog</h2>
	<article>
		<h3><?= $post['title'] ?> <em><?= $post['post_date_fr'] ?></em></h3>
		<p><?= nl2br($post['content']) ?></p>
	</article>
</section>

<section>
	<h2>Commentaires</h2>
	<div class="comment-form">
		<p>Ajouter un commentaire</p>
		<form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
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
		<p><a href="index.php?action=signal&amp;id=<?=$data['id'] ?>">Signaler</a></p>
	</div>
	<?php 
	}
	?>
</section>
<?php 
$comments->closeCursor();
$content = ob_get_clean(); 
?>

<?php require('./view/frontend/clientTemplate.php'); ?>

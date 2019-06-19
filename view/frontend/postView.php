<?php $title = $post['title']; ?>
<?php ob_start();?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?php $head = ob_get_clean(); ?>
<?php ob_start();?>
<section>
	<h2>Le billet du blog</h2>
	<article class="news">
		<h3><?= $post['title'] ?> <em><?= $post['post_date_fr'] ?></em></h3>
		<p><?= $post['content'] ?></p>
	</article>
	<nav>
		<ul>
			<?php if ($_GET['id'] > $minId)
			{
			?>
			<li><a href="index.php?action=previous&amp;id=<?=$post['id']?>">Précédent</a></li>
			<?php
			}
			if ($_GET['id'] < $maxId)
			{
			?>
			<li><a href="index.php?action=next&amp;id=<?=$post['id']?>">Suivant</a></li>
			<?php
			}
			?>
		</ul>
	</nav>
</section>

<section>
	<h2>Commentaires</h2>
	<div class="comment-form">
		<p>Ajouter un commentaire</p>
		<form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
			<div>
				<label for="author">Auteur</label><br />
				<input type="text" id="author" name="author"  required/>
			</div>
			<div>
				<label for="comment">Commentaire</label><br />
				<textarea id="comment" name="comment" required></textarea>
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
		<p><a href="index.php?action=signal&amp;id=<?=$data['id'] ?>&amp;post_id=<?= $data['post_id'] ?>" class="signal-btn" id="signal-btn-<?=$data['id'] ?>">Signaler</a></p>
	</div>
	<script>
		if(localStorage.getItem("signal<?=$data['id'] ?>"))
		{
			$("#signal-btn-<?=$data['id'] ?>").css('pointer-events', 'none');
			$("#signal-btn-<?=$data['id'] ?>").css('cursor', 'default');
			$("#signal-btn-<?=$data['id'] ?>").text('Commentaire déjà signalé');
		}
		$("#signal-btn-<?=$data['id'] ?>").click(function(){
		localStorage.setItem("signal<?=$data['id'] ?>",'true');
		});
	</script>
	<?php 
	}
	?>
</section>
<?php 
$comments->closeCursor();
$content = ob_get_clean(); 
?>

<?php require('./view/frontend/clientTemplate.php'); ?>

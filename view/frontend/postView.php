<?php $title = $post['title']; ?>
<?php ob_start();?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?php $head = ob_get_clean(); ?>
<?php ob_start();?>
<section class="grid">
	<article class="news">
		<h3 class="post-title"><?= $post['title'] ?></h3>
		<?= $post['content'] ?>
	</article>
	<nav class="post-nav">
		<ul>
			<?php if ($_GET['id'] > $minId)
			{
			?>
			<li class="post-prev"><a href="index.php?action=previous&amp;id=<?=$post['id']?>">Précédent</a></li>
			<?php
			}
			if ($_GET['id'] < $maxId)
			{
			?>
			<li class="post-next"><a href="index.php?action=next&amp;id=<?=$post['id']?>">Suivant</a></li>
			<?php
			}
			?>
		</ul>
	</nav>
</section>

<section class="grid">
	<h2>Commentaires (<?= $nbComments ?>)</h2>
	<div class="comment-form">
		<p>Ajouter un commentaire</p>
		<form action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
			<div>
				<label for="create-author">Auteur</label><br />
				<input type="text" id="create-author" name="author"  required/>
			</div>
			<div>
				<label for="create-comment">Commentaire</label><br />
				<textarea id="create-comment" name="comment" rows="2" required></textarea>
			</div>
			<div>
				<input type="submit" class="btn"/>
			</div>
		</form>
	</div>

	<?php
	while ($data = $comments->fetch())
	{
	?>
	<div class="comments">
		<div class="comment-body">
			<p>
				<strong><?= htmlspecialchars($data['author']) ?></strong><em> le <?= $data['comment_date_fr'] ?></em> :
			</p>
			<p> <?= nl2br(htmlspecialchars($data['comment'])) ?>
			</p>
		</div>
		<div class="comment-info">
			<button class="btn" id="signal-btn-<?=$data['id'] ?>" onclick='window.location.href="index.php?action=signal&amp;id=<?=$data['id'] ?>&amp;post_id=<?= $data['post_id'] ?>"'>Signaler</button>
		</div>
	</div>
	<script>
		if(localStorage.getItem("signal<?=$data['id'] ?>"))
		{
			$("#signal-btn-<?=$data['id'] ?>").css('pointer-events', 'none');
			$("#signal-btn-<?=$data['id'] ?>").css('cursor', 'default');
			$("#signal-btn-<?=$data['id'] ?>").css('color', 'red');
			$("#signal-btn-<?=$data['id'] ?>").css('background-color', 'white');
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

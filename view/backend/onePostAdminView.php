<?php $head = ''; ?>
<?php ob_start(); ?>
<section class="grid">
	<article class="news">
		<h3 class="post-title"><?= $post['title'] ?></h3>
		<?= $post['content'] ?>
	</article>
	<div class="one-post-action">
		<button class="btn" onclick='window.location.href="admin.php?action=deletepost&id=<?= $post['id']; ?>"'>Supprimer</button>
		<a class="btn" href="admin.php?action=updatepostview&amp;id=<?= $post['id']; ?>">Mettre à jour</a>
	</div>
	<nav class="post-nav">
		<ul>
			<?php if ($_GET['id'] > $minId)
			{
			?>
			<li class="post-prev"><a href="admin.php?action=previous&amp;id=<?=$post['id']?>">Précédent</a></li>
			<?php
			}
			if ($_GET['id'] < $maxId)
			{
			?>
			<li class="post-next"><a href="admin.php?action=next&amp;id=<?=$post['id']?>">Suivant</a></li>
			<?php
			}
			?>
		</ul>
	</nav>
</section>

<section class="grid last-section">
	<h2>Commentaires (<?= $nbComments ?>)</h2>
	<?php
	while ($data = $comments->fetch())
	{
	?>
	<div class="comments" <?php if(isset($_GET['comment_id']) && $_GET['comment_id'] != $data['id']) { echo "style='display: none;'";}?>>
		<div class="comment-body">
			<p>
				<strong><?= htmlspecialchars($data['author']) ?></strong>
				<em>le <?= $data['comment_date_fr'] ?> :</em>
			</p>

			<p>
				<?= nl2br(htmlspecialchars($data['comment'])) ?>
			</p>
		</div>
		<div class="comment-info">
			<p> 
				Nombre de signalements : <?= $data['signalement'] ?>
			</p>
			<div class="comment-info-btn">
				<button class="btn del-btn" onclick='window.location.href="admin.php?action=deletecomment&amp;id=<?=$data['id']?>&amp;post_id=<?=$data['post_id']?>"'>Supprimer</button>
				<button class="btn" onclick='window.location.href="admin.php?action=unsignal&amp;id=<?=$data['id']?>&amp;post_id=<?=$data['post_id']?>"'>Approuver</button>
			</div>
		</div>
	</div>
	<?php 
	}
	?>
</section>
<?php $contentAdmin = ob_get_clean(); ?>

<?php require('view/backend/adminTemplate.php'); ?>
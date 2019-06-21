<?php $head = ''; ?>
<?php ob_start(); ?>
<section class="grid">
	<h2>Les derniers commentaires</h2>
	<div>
		<a href="admin.php?action=commentadminbyid">Trier par date</a>
		<a href="admin.php?action=commentadminbysignal">Trier par nombre de signalement</a>
	</div>
	<?php
	while($data = $comments->fetch())
	{
	?>
	<div class="comments">
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
			<p> Nombre de signalements : <?= $data['signalement'] ?>
			</p>
			<p>
				<a href="admin.php?action=deletecomment&amp;id=<?=$data['id']?>">Supprimer le commentaire</a>
			</p>
		</div>
	</div>
	<?php
	}
	$comments->closeCursor();
	?>
	<?php $contentAdmin = ob_get_clean(); ?>
</section>

<?php require('view/backend/adminTemplate.php'); ?>
<?php $head = '	<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
'; ?>
<?php ob_start(); ?>
<section class="grid">
	<h2>La liste des commentaires</h2>
	<nav class="comment-sort">
		<ul>
			<li><a href="admin.php?action=commentadminbyid">Trier par date <i class="fas fa-sort-down"></i></a></li>
			<li><a href="admin.php?action=commentadminbysignal">Trier par nombre de signalement <i class="fas fa-sort-down"></i></a></li>
		</ul>
	</nav>
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
			<button class="btn del-btn" onclick='window.location.href="admin.php?action=deletecomment&amp;id=<?=$data['id']?>"'>Supprimer</button>
		</div>
		
	</div>
	<?php
	}
	$comments->closeCursor();
	?>
	<?php $contentAdmin = ob_get_clean(); ?>
</section>

<?php require('view/backend/adminTemplate.php'); ?>
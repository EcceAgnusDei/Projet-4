<?php $title = 'Article'?>

<?php ob_start();?>
<h2>Le billet du blog</h2>

<div class="news">
	<h3><?= $post['title'] ?> <em><?= $post['post_date_fr'] ?></em></h3>
	<p><?= nl2br($post['content']) ?></p>
</div>

<?php
while ($data = $comments->fetch())
{
?>
<div class="comments">
	<p>
		<strong><?= $data['author'] ?></strong> le <?= $data['comment_date_fr'] ?> : <?= $data['comment'] ?>
	</p>
</div>
<?php 
}
$comments->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>

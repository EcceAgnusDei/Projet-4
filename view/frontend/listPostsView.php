<?php $title = 'Mon blog'; ?>
<?php $head = ''; ?>
<?php ob_start(); ?>
<h2>Table des matières : </h2>
<section class="grid">
<?php
while ($data = $posts->fetch())
{
?>
    <h3 class="episode">
        <?= htmlspecialchars($data['title']) ?>
        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="read-episode">Lire l'épisode</a></em>
    </h3>
<?php
}
?>
</section>

<?php 
$posts->closeCursor();
$content = ob_get_clean(); 
?>

<?php require('./view/frontend/clientTemplate.php'); ?>
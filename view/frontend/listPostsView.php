<?php $title = 'Table des matières'; ?>
<?php $head = ''; ?>
<?php ob_start(); ?>
<h2>Table des matières : </h2>
<section class="grid last-section">
<?php
while ($data = $posts->fetch())
{
?>
    <h3 class="episode">
        
        <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="read-episode"><?= htmlspecialchars($data['title']) ?></a></em>
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
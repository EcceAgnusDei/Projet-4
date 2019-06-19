<?php $title = 'Mon blog'; ?>
<?php $head = ''; ?>
<?php ob_start(); ?>
<h2>Les derniers articles :</h2>
<section>
<?php
while ($data = $posts->fetch())
{
?>
    <article class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['post_date_fr'] ?></em>
        </h3>
        
        <p>
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire l'article</a></em>
        </p>
    </article>
<?php
}
?>
</section>

<?php 
$posts->closeCursor();
$content = ob_get_clean(); 
?>

<?php require('./view/frontend/clientTemplate.php'); ?>
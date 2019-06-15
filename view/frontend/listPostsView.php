<?php $title = 'Mon blog'; ?>

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
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
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
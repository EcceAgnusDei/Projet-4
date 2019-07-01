<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

/**
 * Affiche la liste des articles
 * 
 */
function listPosts()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}

/**
 * Affiche un article grâce à son id obtenu par une variable superlocale
 * 
 */
function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	$maxId = $postManager->lastPost();
	$minId = $postManager->firstPost();
	$nbComments = $commentManager->countComments($_GET['id']);

	require('view/frontend/postView.php');
}

/**
 * Renvoie vers l'article précédent
 * @param  int $id id de l'article courant 
 */
function previousPost($id)
{
	$postManager = new PostManager();
	$idPrev = $postManager->previous($id);

	header('Location: index?action=post&id=' . $idPrev);
}

/**
 * Renvoie vers l'article suivant
 * @param  int $id id de l'article courant
 */
function nextPost($id)
{
	$postManager = new PostManager();
	$idNext = $postManager->next($id);

	header('Location: index?action=post&id=' . $idNext);
}

/**
 * Renvoie vers le dernier article en date
 */
function lastEpisode()
{
	$postManager = new PostManager();
	$lastPostId = $postManager->lastPost();

	header('Location: index?action=post&id=' . $lastPostId);
}

/**
 * Ajoute un commentaire
 * @param int $postId  id de l'article commenté
 * @param string $author  Nom de l'auteur de l'article
 * @param string $comment Contenu du commentaire
 */
function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();

	$succes = $commentManager->postComment($postId, $author, $comment);

	if ($succes === false)
	{
		throw new Exception('Le commentaire n\'a pu être ajouté...');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}

/**
 * Signal un commentaire
 * @param  int $commentId id du commentaire à signaler
 */
function signal($commentId)
{
	$commentManager = new CommentManager();
	$succes = $commentManager->signal($commentId);

	if ($succes === false)
	{
		throw new Exception('Le commentaire n\'a pu être signalé...');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $_GET['post_id']);
	}
}

/**
 * Annul le signalement (remet le nombre de signalement à 0)
 * @param  int $commentId id du commentaire dont on veut annuler le signalement
 */
function unsignal($commentId)
{
	$commentManager = new CommentManager();
	$succes = $commentManager->unsignal($commentId);

	if ($succes === false)
	{
		throw new Exception('Le commentaire n\'a pu être signalé...');
	}
	else
	{
		header('Location: admin.php?action=commentadminbysignal');
	}
}

/**
 * Redirige vers la page de connexion
 * @return [type] [description]
 */
function login()
{
	$error = '';
	require('view/backend/loginView.php');
}

/**
 * Redirige vers la page de connexion lorsque les identifiant/mot de passe ne sont pas bons.
 */
function logingError()
{
	$error = "<p style='color: red'>Identifiant ou mot de passe incorrect</p>";
	require('view/backend/loginView.php');
}

/**
 * Ouvre la session admin
 * @param  string $user     identifiant
 * @param  string $password mot de passe
 */
function admin($user, $password)
{
	$_SESSION['user'] = $user;
	$_SESSION['password'] = $password;
	header('Location: admin.php');
}
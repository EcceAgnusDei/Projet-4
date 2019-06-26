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

/**
 * Ferme la session admin
 */
function logout()
{
	session_destroy();
	header('Location: index.php');
}

/**
 * Redirige vers la page d'administration des posts
 */
function postAdmin()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require ('view/backend/postAdminView.php');
}

/**
 * Redirige vers la page d'administrations d'un seul post
 * @param  int $id id du post que l'on veut administrer
 */
function onePostAdmin($id)
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$maxId = $postManager->lastPost();
	$minId = $postManager->firstPost();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	$nbComments = $commentManager->countComments($_GET['id']);

	require('view/backend/onePostAdminView.php');
}

/**
 * Affiche la liste des commentaires du plus récent au plus ancien
 */
function listCommentsById()
{
	$commentManager = new CommentManager();
	$comments = $commentManager->getAllById();

	require('view/backend/commentAdminView.php');
}

/**
 * Affiche la liste des commentaires du plus signalé au moins signalé
 */
function listCommentsBySignal()
{
	$commentManager = new CommentManager();
	$comments = $commentManager->getAllBySignal();

	require('view/backend/commentAdminView.php');
}

/**
 * Supprime un commenantaire
 * @param  int $id id du commentaire à supprimer
 */
function deleteComment($id)
{
	$commentManager = new CommentManager();
	$commentManager->delete($id);

	if(isset($_GET['post_id']))
	{
		header('location: admin.php?action=onepostadmin&id=' . $_GET['post_id']);
	}
	else
	{
		header('location: admin.php?action=commentadminbyid');
	}
}

/**
 * Enregistre un post dans la base de données
 * @param  string $title   Titre du post
 * @param  string $content Contenu du post
 */
function createPost($title, $content)
{
	$postManager = new PostManager();
	$succes = $postManager->addPost($title, $content);
	if($succes)
	{
		header('Location: admin.php?action=postadmin#admin-posts');
	}
	else
	{
		throw new Exception('Erreur lors de la publication de l\'article');
	}
}

/**
 * Supprime un post
 * @param  int $id id du post que l'on veut supprimer
 */
function deletePost($id)
{
	$postManager = new PostManager();
	$succes = $postManager->delete($id);
	if($succes)
	{
		header('location: admin.php?action=postadmin');
	}
	else
	{
		throw new Exception('Erreur lors de la suppression de l\'article');
	}
}

/**
 * Renvoie à la page permettant la mise à jour d'un post
 * @param  int $id id du post que l'on veut mettre à jour
 */
function updatePostView($id)
{
	$postManager = new PostManager();
	$post = $postManager->getPost($id);

	require('view/backend/createPostView.php');
}

/**
 * Met à jour le post
 * @param  int $id      id du post mis à jour
 * @param  string $title   nouveau titre du post
 * @param  string $content nouveau contenu du post
 */
function updatePost($id, $title, $content)
{
	$postManager = new PostManager();
	$succes = $postManager->update($id, $title, $content);
	if($succes)
	{
		header('Location: admin.php?action=postadmin#' . $_GET['id']);
	}
	else
	{
		throw new Exception('Erreur lors de la mise à jour de l\'article');
	}
}

/**
 * Renvoie au post précédent coté admin
 * @param  int $id id du post courant
 */
function adminPreviousPost($id)
{
	$postManager = new PostManager();
	$idPrev = $postManager->previous($id);

	header('Location: admin?action=onepostadmin&id=' . $idPrev);
}

/**
 * Renvoie au post suivant coté admin
 * @param  int $id id du post courant
 */
function adminNextPost($id)
{
	$postManager = new PostManager();
	$idNext = $postManager->next($id);

	header('Location: admin?action=onepostadmin&id=' . $idNext);
}


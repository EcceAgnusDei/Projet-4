<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
require_once('./model/PostManager.php');
require_once('./model/CommentManager.php');

function listPosts()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('./view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	$maxId = $postManager->lastPost();
	$minId = $postManager->firstPost();
	$nbComments = $commentManager->countComments($_GET['id']);

	require('./view/frontend/postView.php');
}

function previousPost($id)
{
	$postManager = new PostManager();
	$idPrev = $postManager->previous($id);

	header('Location: index?action=post&id=' . $idPrev);
}

function nextPost($id)
{
	$postManager = new PostManager();
	$idNext = $postManager->next($id);

	header('Location: index?action=post&id=' . $idNext);
}

function lastEpisode()
{
	$postManager = new PostManager();
	$lastPostId = $postManager->lastPost();

	header('Location: index?action=post&id=' . $lastPostId);

}

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

function login()
{
	$error = '';
	require('./view/backend/loginView.php');
}

function logingError()
{
	$error = "<p style='color: red'>Identifiant ou mot de passe incorrect</p>";
	require('./view/backend/loginView.php');
}

function admin($user, $password)
{
	$_SESSION['user'] = $user;
	$_SESSION['password'] = $password;
	header('Location: admin.php');
}

function logout()
{
	session_destroy();
	header('Location: index.php');
}

function postAdmin()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require ('view/backend/postAdminView.php');
}

function onePostAdmin($id)
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$maxId = $postManager->lastPost();
	$minId = $postManager->firstPost();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	$nbComments = $commentManager->countComments($_GET['id']);

	require('./view/backend/onePostAdminView.php');
}

function listCommentsById()
{
	$commentManager = new CommentManager();
	$comments = $commentManager->getAllById();

	require('view/backend/commentAdminView.php');
}

function listCommentsBySignal()
{
	$commentManager = new CommentManager();
	$comments = $commentManager->getAllBySignal();

	require('view/backend/commentAdminView.php');
}

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

function updatePostView($id)
{
	$postManager = new PostManager();
	$post = $postManager->getPost($id);

	require('view/backend/createPostView.php');
}

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

function adminPreviousPost($id)
{
	$postManager = new PostManager();
	$idPrev = $postManager->previous($id);

	header('Location: admin?action=onepostadmin&id=' . $idPrev);
}

function adminNextPost($id)
{
	$postManager = new PostManager();
	$idNext = $postManager->next($id);

	header('Location: admin?action=onepostadmin&id=' . $idNext);
}


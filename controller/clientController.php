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

	require('./view/frontend/postView.php');
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

function login()
{
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
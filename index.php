<?php
require('controller/clientController.php');

if (isset($_GET['action']))
{
	if ($_GET['action'] == 'listPosts')
	{
		listPosts();
	}
	elseif ($_GET['action'] == 'post')
	{
		if(isset($_GET['id']) && $_GET['id'] > 0)
		{
			post();
		}
		else
		{
			echo 'Erreur : aucun identifiant de billet n\'a été envoyé';
		}
	}
	elseif ($_GET['action'] == 'addComment')
	{
		if (isset($_GET['id']) && $_GET['id'] > 0) 
		{
			if (!empty($_POST['author']) && !empty($_POST['comment'])) 
			{
				addComment($_GET['id'], $_POST['author'], $_POST['comment']);
			}
			else 
			{
				echo 'Erreur : tous les champs ne sont pas remplis !';
			}
		}
		else 
		{
			echo 'Erreur : aucun identifiant de billet envoyé';
		}
	}
	elseif ($_GET['action'] == 'login')
	{
		if(isset($_SESSION['user']))
		{
			header('Location: admin.php');
		}
		else
		{
			login();
		}
		
	}
	elseif ($_GET['action'] == 'identifying')
	{
		if ($_POST['login'] == 'admin' && $_POST['password'] == 'admin')
		{
			admin($_POST['login'], $_POST['password']);
		}
		else
		{
			echo "<p>L'authentification a échoué... <a href='index.php'>Revenir à l'accueil</a></p>";
		}
	}
	elseif ($_GET['action'] == 'signal')
	{
		if (isset($_GET['id']) && $_GET['id'] > 0)
		{
			signal($_GET['id']);
			header('Location: index.php?action=post&id=' . $_GET['post_id']);
		}
		else
		{
			echo 'Erreur : Aucun commentaire n\'est identifié';
		}
	}
}
else
{
	listPosts();
}
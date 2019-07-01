<?php
require('controller/clientController.php');
require('controller/adminController.php');

try
{
	if (isset($_GET['action']))
	{
		switch ($_GET['action'])
		{
			case 'listPosts':
			{
				listPosts();
			}
			break;
			case 'post':
			{
				if(isset($_GET['id']) && $_GET['id'] > 0)
				{
					post();
				}
				else
				{
					throw new Exception('Aucun identifiant de billet n\'a été envoyé');
				}
			}
			break;
			case 'lastEpisode':
			{
				lastEpisode();
			}
			break;
			case 'addComment':
			{
				if (isset($_GET['id']) && $_GET['id'] > 0) 
				{
					if (!empty($_POST['author']) && !empty($_POST['comment'])) 
					{
						addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
					}
					else 
					{
						throw new Exception('Tous les champs ne sont pas remplis !');
					}
				}
				else 
				{
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			}
			break;
			case 'login':
			{
				if (isset($_SESSION['user']))
				{
					header('Location: admin.php');
				}
				else
				{
					login();
				}
			}
			break;
			case 'identifying':
			{
				if ($_POST['login'] == 'admin' && $_POST['password'] == 'admin')
				{
					admin($_POST['login'], $_POST['password']);
				}
				else
				{
					logingError();
				}
			}
			break;
			case 'signal':
			{
				if (isset($_GET['id']) && $_GET['id'] > 0)
				{
					signal($_GET['id']);
				}
				else
				{
					throw new Exception('Aucun commentaire n\'est identifié');
				}
			}
			break;
			case 'previous':
			{
				if (isset($_GET['id']))
				{
					previousPost($_GET['id']);
				}
				else
				{
					throw new Exception('Aucun id renseigné');
				}
			}
			break;
			case 'next':
			{
				if (isset($_GET['id']))
				{
					nextPost($_GET['id']);
				}
				else
				{
					throw new Exception('Aucun id renseigné');
				}
			}
			break;
		}
	}
	else
	{
		require('view/frontend/homeView.php');
	}
}
catch (Exception $e)
{
	$errorMessage = $e->getMessage();
	require('view/frontend/errorView.php');
}

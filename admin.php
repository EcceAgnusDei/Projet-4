<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
require('controller/clientController.php');

try
{
	if (isset($_SESSION['user']))
	{
		if (isset($_GET['action']))
		{
			switch ($_GET['action'])
			{
				case 'logout':
				{
					logout();
				}
				break;
				case 'postadmin':
				{
					postadmin();
				}
				break;
				case 'commentadminbyid':
				{
					listCommentsById();
				}
				break;
				case 'commentadminbysignal':
				{
					listCommentsBySignal();
				}
				break;
				case 'deletecomment':
				{
					if(isset($_GET['id']))
					{
						deleteComment($_GET['id']);
					}
					else
					{
						throw new Exception('Aucun Id renseigné');
					}
				}
				break;
				case 'newpost':
				{
					require('view/backend/createPostView.php');
				}
				break;
				case 'createpost':
				{
					createPost($_POST['create-title'], $_POST['create-content']);
				}
				break;
				case 'deletepost':
				{
					if(isset($_GET['id']))
					{
						deletePost($_GET['id']);
					}
					else
					{
						throw new Exception('Aucun Id renseigné');
					}
				}
				break;
				case 'updatepostview':
				{
					if(isset($_GET['id']))
					{
						updatePostView($_GET['id']);
					}
					else
					{
						throw new Exception('Aucun Id renseigné');
					}
				}
				break;
				case 'updatepost':
				{
					updatePost($_GET['id'], $_POST['create-title'], $_POST['create-content']);
				}
				break;
				case 'unsignal':
				{
					if (isset($_GET['id']) && $_GET['id'] > 0)
					{
						unsignal($_GET['id']);
					}
					else
					{
						throw new Exception('Aucun commentaire n\'est identifié');
					}
				}
				break;
			}
		}
		else
		{
			postAdmin();
		}
	}
	else
	{
		throw new Exception("Vous n'avez pas les droits nécessaires pour accéder à ces pages");
	}
}
catch (Exception $e)
{
	$errorMessage = $e->getMessage();
	require('view/frontend/errorView.php');
}
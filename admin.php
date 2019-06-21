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
			if ($_GET['action'] == 'logout')
			{
				logout();
			}
			elseif ($_GET['action'] == 'postadmin')
			{
				postadmin();
			}
			elseif ($_GET['action'] == 'commentadminbyid')
			{
				listCommentsById();
			}
			elseif ($_GET['action'] == 'commentadminbysignal')
			{
				listCommentsBySignal();
			}
			elseif ($_GET['action'] == 'deletecomment')
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
			elseif ($_GET['action'] == 'newpost')
			{
				require('view/backend/createPostView.php');
			}
			elseif ($_GET['action'] == 'createpost')
			{
				createPost($_POST['create-title'], $_POST['create-content']);
			}
			elseif ($_GET['action'] == 'deletepost')
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
			elseif ($_GET['action'] == 'updatepostview')
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
			elseif ($_GET['action'] == 'updatepost')
			{
				updatePost($_GET['id'], $_POST['create-title'], $_POST['create-content']);
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
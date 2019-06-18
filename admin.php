<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
require('controller/clientController.php');

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
				echo 'Aucun Id renseigné';
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
				echo 'Veuillez indiquer l\'id de l\'article à supprimer';
			}
		}
	}
	else
	{
		require('view/backend/adminView.php');
	}
}
else
{
	echo "Vous n'avez pas les droits nécessaires pour accéder à ces pages";
}
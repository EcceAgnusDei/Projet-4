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
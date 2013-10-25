<?php
	require_once('conf/fonctions.php');
	if($_REQUEST['type'] == 1)
	{
		session_start();
		$mail = $_REQUEST['mail'];
		$mdp = md5($_REQUEST['mdp']);
		if(verifAdmin($mail, $mdp))
		{
			echo'1';
		}
		else
		{
			echo '0';
		}
	} 
	elseif($_REQUEST['type'] == 0)
	{
		session_start();
		$_SESSION = array();
		session_destroy();
	}


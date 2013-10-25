<?php 
	require_once'../conf/connexionBDD.php';
	global $bdd;
	$reponse = $bdd -> query('
			INSERT INTO Videos(vid_lien)
			VALUE("'.$_REQUEST['lien'].'")
			');
?>
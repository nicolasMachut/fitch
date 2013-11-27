<?php
	require_once'connexionBDD.php';
	
function getPhotos()
{
	global $bdd;
	$photos = array();
	$reponse = $bdd -> query('
			SELECT pho_lien FROM Photos
			');
	while( $donnee = $reponse-> fetch() )
	{
		$photos[] = $donnee;
	}
	return $photos;
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function getVideos()
{
	global $bdd;
	$videos = array();
	if(classementVideo())
	{
		$reponse = $bdd -> query('
				SELECT * FROM Videos ORDER BY vid_id DESC
				');
	}
	else
	{
		$reponse = $bdd -> query('
				SELECT * FROM Videos ORDER BY vid_id ASC
				');
	}
	while( $donnee = $reponse -> fetch() )
	{
		$videos[] = $donnee;
	}
	return $videos;
}
	
	//------------------------------------------------------------------------------------------------------------------
	
	
function getMusic()
{
	global $bdd;
	$music = array();
	$reponse = $bdd -> query('
				SELECT * FROM Music
			');
	while( $donnee = $reponse -> fetch() )
	{
		$music[] = $donnee;
	}
	return $music;
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function verifAdmin($mail, $mdp)
{
	global $bdd;
	$reponse = $bdd -> query('
			SELECT * FROM Admin WHERE adm_mail = "'.$mail.'" AND adm_mdp = "'.$mdp.'"
			');
	if ( $donnee = $reponse -> fetch() )
	{
		session_start();
		$_SESSION['mail'] = $mail;
		return true;
	}
	else 
	{
		return false;
	}
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function removeVideo($id)
{
	global $bdd;
	$reponse = $bdd -> query('
			DELETE FROM Videos WHERE vid_id = '.$id.'
			');
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function removeMusic($id)
{
	global $bdd;
	$reponse = $bdd -> query('
			DELETE FROM Music WHERE mus_id = "'.$id.'"
			');
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function addVideo()
{
	global $bdd;
	$video = getVideoInfo("http://www.youtube.com/watch?v=".$_REQUEST['lien']);
	$reponse = $bdd -> query('
			INSERT INTO Videos(vid_lien, vid_titre)
			VALUE("'.$_REQUEST['lien'].'", "'.$video['titre'].'")
			');
	return $reponse;
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function addPhoto()
{
	global $bdd;
	$reponse = $bdd -> query('
			INSERT INTO Photos(pho_lien)
			VALUE("'.$_REQUEST['lien'].'")
			');
	return 2;
}

//------------------------------------------------------------------------------------------------------------------
	
function addMusic()
{
	global $bdd;
	$reponse = $bdd -> query('
			INSERT INTO Music(mus_lien)
			VALUE("'.$_REQUEST['lien'].'")
			');
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function classementVideo()
{
	global $bdd;
	$reponse = $bdd -> query('
			SELECT classementVideo FROM Site
			');
	$donnee = $reponse -> fetch();
	return $donnee['classementVideo'];
}
	
	//------------------------------------------------------------------------------------------------------------------
	
function updateClassementVideo($sens)
{
	global $bdd;
	echo $sens;
	if($sens == '1')
	{
		$reponse = $bdd -> query('
				UPDATE Site SET classementVideo = "1" WHERE classementVideo = "0" ;
				');
	}
	else
	{
		$reponse = $bdd -> query('
				UPDATE Site SET classementVideo = "0" WHERE classementVideo = "1" ;
				');
	}
	return $reponse;
}

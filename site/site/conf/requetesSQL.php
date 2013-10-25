<?php
	require_once'connexionBDD.php';
	
	function getPhotos()
	{
		global $bdd;
		$photos = array();
		$reponse = $bdd -> query('
				SELECT pho_nom FROM Photos
				');
		while( $donnee = $reponse-> fetch() )
		{
			$photos[] = $donnee;
		}
		return $photos;
	}
	
	function getVideos()
	{
		global $bdd;
		$videos = array();
		$reponse = $bdd -> query('
					SELECT * FROM Videos
				');
		while( $donnee = $reponse -> fetch() )
		{
			$videos[] = $donnee;
		}
		return $videos;
	}
	
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
	?>
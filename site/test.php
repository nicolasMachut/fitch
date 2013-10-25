 <?
 require_once'conf/requetesSQL.php';
 require_once'conf/fonctions.php';
	$videos = getVideos();
	$type = 1;
	if( $type == 1 )
	{
		echo'<fieldset><legend>Supprimer une vidéo :</legend>';
		echo'<table class="table table-hover">';
		echo'<th>Titre</th><th>Supprimer</th>';
	}
		foreach($videos as $v)
		{
			if( $type == 1 )
			{
				$video = getVideoInfo("http://www.youtube.com/watch?v=".$v['vid_lien']);
				//echo $video['titre'];
				echo'<tr>';
				echo '<td><a href="http://www.youtube.com/watch?v='.$v['vid_lien'].'" target="blank">'.$video['titre'].'</a></td>';
				echo'<td onclick="removeVideo('.$v['vid_id'].');"><i class="icon-remove"></i>  Supprimer vidéo n° : '.$v['vid_id'].'</td>';
				echo'</tr>';
			}
			else
			{
				echo'<center><ul style="list-style-type:none;"><li><iframe width="853" height="480" src="//www.youtube.com/embed/'.$v['vid_lien'].'" frameborder="0" allowfullscreen></iframe></li></ul></center>';
			}
	}
		if( $type == 1 )
		{
			echo'</table>';
			echo'</fieldset>';
		}

<?php 
	require_once'requetesSQL.php';
	function connexionBDD()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=fitch', 'root', '812AJH', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
		}
		catch(Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	function page($p)
	{
		switch ($p)
		{
			case $p : include $p.'.php';
		}
	}
	
	function addVideo()
	{?>
		<fieldset>
		<legend>Ajouter une vidéo : </legend>
		<form class="form-inline" method="POST">
			<textarea rows="5" id="lien" placeholder="Coller l'Id de la vidéo"></textarea>
			<button type="submit" class="btn" onclick="addVideo(); return false;">Valider</button>
		</form>
		<div class="alert alert-error">
			<p>Veuillez coller un lien pour ajouter une vidéo.</p>
		</div>
		</fieldset>
	<?php
	}
	
	function addMusic()
	{?>
		<fieldset>
			<form class="form">
			<legend>Ajouter une musique : </legend>
			<label class="radio">
  		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
  			Soundcloud
		</label>
		<label class="radio">
  		<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
  			Mixcloud
		</label>
		<form method="POST">
			<textarea rows="5" id="lien" onFocus="javascript:this.value=''">Coller le lien ICI : </textarea>
			<input type="submit" class="btn btn-success" onclick="addMusic()">
			</form>
		</fieldset>

	<?php 
	}
	function removeMusic()
	{
		echo'<h3>Supprimer une musique : </h3>';
		displayMusic(1);	
	}
	
	function displayMusic($type)
	{
		$music = getMusic();
		foreach($music as $m)
		{
			$lien = $m['mus_lien'];
			echo'<iframe width="100%" height="160" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$lien.'&amp;color=999999&amp;auto_play=false&amp;show_artwork=true"></iframe>';
			//echo'<iframe width="100%" height="160" src="//www.mixcloud.com/widget/iframe/?feed=http%3A%2F%2Fwww.mixcloud.com%2FMayapur_sound_system%2Fz-aires-anti-end-world-chicago-detroit-acid-house-december-2012%2F&show_tracklist=&stylecolor=999999&hide_artwork=&mini=&embed_type=widget_standard&embed_uuid=eeafe205-c4ca-49d8-b319-997c7dc223df&hide_cover=1" frameborder="0"></iframe><div style="clear:both; height:3px; width:auto;"></div><p style="display:block; font-size:12px; font-family:Helvetica, Arial, sans-serif; margin:0; padding: 3px 4px; color:#999999; width:auto;"><a href="http://www.mixcloud.com/Mayapur_sound_system/z-aires-anti-end-world-chicago-detroit-acid-house-december-2012/?utm_source=widget&amp;utm_medium=web&amp;utm_campaign=base_links&amp;utm_term=resource_link" target="_blank" style="color:#999999; font-weight:bold;">Z-AIRES Anti-end-world Chicago-detroit acid house december 2012 :)</a><span> by </span><a href="http://www.mixcloud.com/Mayapur_sound_system/?utm_source=widget&amp;utm_medium=web&amp;utm_campaign=base_links&amp;utm_term=profile_link" target="_blank" style="color:#999999; font-weight:bold;">Mayapur Sound System</a><span> on </span><a href="http://www.mixcloud.com/?utm_source=widget&utm_medium=web&utm_campaign=base_links&utm_term=homepage_link" target="_blank" style="color:#999999; font-weight:bold;"> Mixcloud</a></p><div style="clear:both; height:3px;"></div>';	
			if($type == 1)
			{
				echo'<p onclick="removeMusic('.$m['mus_id'].')"><i class="icon-remove"></i>  Supprimer musique n° : '.$m['mus_id'].'</p>';
			}
		}
	}	
	
	
	function displayVideo($type)
	{
		$videos = getVideos();
		foreach($videos as $v)
		{
			if( $type == 1 )
			{
				echo'<center><ul style="list-style-type:none;"><li><iframe width="100%" height="200" src="//www.youtube.com/embed/'.$v['vid_lien'].'" frameborder="0" allowfullscreen></iframe></li></ul></center>';
				echo'<p onclick="removeVideo('.$v['vid_id'].')"><i class="icon-remove"></i>  Supprimer vidéo n° : '.$v['vid_id'].'</p>';
			}
			else
			{
				echo'<center><ul style="list-style-type:none;"><li><iframe width="853" height="480" src="//www.youtube.com/embed/'.$v['vid_lien'].'" frameborder="0" allowfullscreen></iframe></li></ul></center>';
			}
		}
	}

	function removeVideo()
	{
		displayVideo(1);
	}
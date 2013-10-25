<?php 
require_once'requetesSQL.php';


function page($p)//Inclus les pages en fonction du paramètre
{
	switch ($p)
	{
		case $p : include $p.'.php';
	}
}
	
//----------------------------------------------------------------------------------------------------------------------------------------

function displayAddVideo()//Affiche le formulaire d'ajout de vidéo
{?>
<span class="span6">
	<fieldset>
	<legend>Ajouter une vidéo : </legend>
	<form class="form-inline" method="POST">
		<textarea rows="1" id="lien" placeholder="Coller l'Id de la vidéo"></textarea>
		<button type="submit" class="btn" onclick="addVideo(); return false;">Valider</button>
	</form> 
	</fieldset>
</span>
<span class="span6">
<?php displayFormClassement();?>
</span>
<script>
window.onload = function() { loadDisplayVideo(); };
</script>
<?php
}

//----------------------------------------------------------------------------------------------------------------------------------------

function displayFormClassement()
{
	if( classementVideo() )
	{
		//classementVideo vaut 1
	}
	else
	{
		//DE LA PLUS ANCIENNE A LA PLUS RECENTE -> DESC
	}
	?>
	<form class="form-inline" id="classement" name = "classement" onchange="classementVideo(classement);">
		<label class="radio">
  			<input type="radio" name="optionsRadios" id="radios1" value=0 <?php if(classementVideo()){echo checked;}?>>
  			Classer de la plus ancienne à la plus récente
		</label>
		<label class="radio">
 			<input type="radio" name="optionsRadios" id="radios2" value=1 <?php if(!classementVideo()){echo checked;}?>>
  			Classer de la plus récente à la plus ancienne
		</label>
	</form>
	<?php 
}

//----------------------------------------------------------------------------------------------------------------------------------------
	
function displayAddMusic()//Affiche le formulaire d'ajout de music
{?>
<span class="span6">
		<fieldset>
			<legend>Ajouter une musique : </legend>
		<form method="POST">
			<textarea rows="4" id="lien" placeholder="Coller l'Id de la musique"></textarea>
			<button type="submit" class="btn" onclick="addMusic(); return false;">Valider</buton>
		</form>
	</fieldset>
</span>
<span class="span6">
<?php displayFormClassement();?>
</span>
<script>
window.onload = function() { loadDisplayMusic(); };
</script>
<?php 
}

//----------------------------------------------------------------------------------------------------------------------------------------

function displayAddPhoto()//Affiche le formulaire d'upload de photo
{/*
	?>
	<fieldset>
	<legend>Ajouter une photo : </legend>
<!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
     <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    </fieldset>
    <?php */
?>
<button type="button" data-toggle="modal" data-target="#myModal">Launch modal</button>
<div class="modal hide fade">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3>Modal header</h3>
</div>
<div class="modal-body">
<p>One fine body…</p>
</div>
<div class="modal-footer">
<a href="#" class="btn">Close</a>
<a href="#" class="btn btn-primary">Save changes</a>
</div>
</div><?php 
}

//----------------------------------------------------------------------------------------------------------------------------------------


function displayRemoveMusic()//Affiche le formulaire de suppression de music
{
	echo'<h3>Supprimer une musique : </h3>';
	displayMusic(1);	
}

//----------------------------------------------------------------------------------------------------------------------------------------
	
function displayMusic($type)//Affiche les musics
{
	$music = getMusic();
	if( $type == 1 )
	{
		echo'<fieldset><legend>Supprimer une musique :</legend>';
	}
	foreach($music as $m)
	{
		$lien = $m['mus_lien'];
		
		//echo'<iframe width="100%" height="160" src="//www.mixcloud.com/widget/iframe/?feed=http%3A%2F%2Fwww.mixcloud.com%2FMayapur_sound_system%2Fz-aires-anti-end-world-chicago-detroit-acid-house-december-2012%2F&show_tracklist=&stylecolor=999999&hide_artwork=&mini=&embed_type=widget_standard&embed_uuid=eeafe205-c4ca-49d8-b319-997c7dc223df&hide_cover=1" frameborder="0"></iframe><div style="clear:both; height:3px; width:auto;"></div><p style="display:block; font-size:12px; font-family:Helvetica, Arial, sans-serif; margin:0; padding: 3px 4px; color:#999999; width:auto;"><a href="http://www.mixcloud.com/Mayapur_sound_system/z-aires-anti-end-world-chicago-detroit-acid-house-december-2012/?utm_source=widget&amp;utm_medium=web&amp;utm_campaign=base_links&amp;utm_term=resource_link" target="_blank" style="color:#999999; font-weight:bold;">Z-AIRES Anti-end-world Chicago-detroit acid house december 2012 :)</a><span> by </span><a href="http://www.mixcloud.com/Mayapur_sound_system/?utm_source=widget&amp;utm_medium=web&amp;utm_campaign=base_links&amp;utm_term=profile_link" target="_blank" style="color:#999999; font-weight:bold;">Mayapur Sound System</a><span> on </span><a href="http://www.mixcloud.com/?utm_source=widget&utm_medium=web&utm_campaign=base_links&utm_term=homepage_link" target="_blank" style="color:#999999; font-weight:bold;"> Mixcloud</a></p><div style="clear:both; height:3px;"></div>';	
		if($type == 1)
		{
			echo'<iframe width="100%" height="120" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$lien.'&amp;color=999999&amp;auto_play=false&amp;show_artwork=true"></iframe>';
			echo'<p onclick="removeMusic('.$m['mus_id'].')"><i class="icon-remove"></i>  Supprimer musique n° : '.$m['mus_id'].'</p>';
		}
		else
		{
			echo'<iframe width="100%" height="160" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$lien.'&amp;color=999999&amp;auto_play=false&amp;show_artwork=true"></iframe>';
		}
	}
	if( $type == 1 )
	{
		echo'</fieldset>';
	}
}	
	
//----------------------------------------------------------------------------------------------------------------------------------------	

function displayVideo($type)//Affiche les vidéos
{
	$videos = getVideos();
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
				echo'<tr>';
				echo '<td><a href="http://www.youtube.com/watch?v='.$v['vid_lien'].'" target="blank">'.$v['vid_titre'].'</a></td>';
				echo'<td style="text-align:center" onclick="removeVideo('.$v['vid_id'].');"><i class="icon-remove"></i></td>';
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
}

//----------------------------------------------------------------------------------------------------------------------------------------

function displayUpdateVignette()
{
	
}

//----------------------------------------------------------------------------------------------------------------------------------------
	
	function displayParDefaut()//Affiche la page par défaut de l'espace admin
	{
echo'<div class="hero-unit">
  <h1>Espace administrateur</h1><br/>
  <p>Vous êtes maintenant connecté à votre espace administrateur.</p>
  <p>Grâce aux différentes fonctionnalités offertes par cette page, vous pourrez configurer le site à votre guise.</p>
  <p>Une documentation utilisateure est disponible <a href="">içi</a> et accessible a tout moment en cliquant sur "Documentation utilisateur" dans le menu de gauche.</p>

</div>';
	}
	
function getVideoInfo($url){//Renvoie les informations d'une vidéo en fonction de son url
	$type = "";
	$id = -1;
	$titre = "no title";
	$description = "no description";
	$code = "no code";
	$img = "no image";
	//Détermination du "type" de vidéo :
	if(mb_eregi("youtube",$url))            $type="youtube";
	else if(mb_eregi("dailymotion",$url))    $type="dailymotion";
	else if(mb_eregi("google",$url))        $type="google";
	else if(mb_eregi("vimeo",$url))        $type="vimeo";
	else return false;

	//Détermination de l'"ID" de la vidéo :
	if($type=="youtube"){
		$debut_id = explode("v=",$url,2);
		$id_et_fin_url = explode("&",$debut_id[1],2);
		$id = $id_et_fin_url[0];
	}
	else if($type=="dailymotion"){
		$debut_id = explode("/video/",$url,2);
		$id_et_fin_url = explode("_",$debut_id[1],2);
		$id = $id_et_fin_url[0];
	}
	else if($type=="google"){
		$debut_id =  explode("docid=",$url,2);
		$id_et_fin_url = explode("&",$debut_id[1],2);
		$id = $id_et_fin_url[0];
	}
	else if($type=="vimeo"){
		$l_id= eregi("([0-9]+)$",$url,$lid);
		$id = $lid[0];
	}

	//Analyse et stockage des informations de la vidéo
	if($type=="youtube"){
		$xml = @file_get_contents("http://gdata.youtube.com/feeds/api/videos/".
				$id);
		//titre
		preg_match('#<title(.*?)>(.*)<\/title>#is',$xml,$resultTitre);
		$titre = $resultTitre[count($resultTitre)-1];
		//description
		preg_match('#<content(.*?)>(.*)<\/content>#is',$xml,$resultDescription);
		$description = $resultDescription[count($result)-1];
		//Image
		$img = "http://img.youtube.com/vi/".$id."/1.jpg";
		//Code HTML
		$code =
		'<object width="425" height="355"><param name="movie"' .
		' value="http://www.youtube.com/v/'.$id.
		'&hl=fr"></param><param name="wmode" value="transparent"></param><embed' .
		' src="http://www.youtube.com/v/'.$id.
		'&hl=fr" type="application/x-shockwave-flash" wmode="transparent" width="425"' .
		' height="355"></embed></object>';
	}
	else if ($type=="dailymotion"){
		$tags = get_meta_tags("http://www.dailymotion.com/video/".$id);
		//titre
		$titre = htmlspecialchars(trim(str_replace("Dailymotion -","",$tags[
				"title"])));
		//description
		$description = $tags["description"];
		//image
		$img = "http://www.dailymotion.com/thumbnail/160x120/video/".$id;
		// code HTML
		$code =
		'<div><object width="420" height="357"><param name="movie"' .
		' value="http://www.dailymotion.com/swf/'.$id.
		'&v3=1&related=1"></param><param name="allowFullScreen"' .
		' value="true"></param><param name="allowScriptAccess" value="always"></param>' .
		'<embed src="http://www.dailymotion.com/swf/'.$id.
		'&v3=1&related=1" type="application/x-shockwave-flash" width="420"' .
		' height="357" allowFullScreen="true" allowScriptAccess="always"></embed></obj' .
		'ect></div>';
	}
	else if ($type=="google"){
		$xml_string = @file_get_contents(
				"http://video.google.com/videofeed?docid=".$id);
		//titre
		$xml_title_debut = explode("<title>",$xml_string,2);
		$xml_title_fin = explode("</title>",$xml_title_debut[1],2);
		$titre = $xml_title_fin[0];
		//description
		$xml_description_debut = explode("<description>",$xml_string,2);
		$xml_description_fin = explode("</description>",$xml_description_debut[1
				],2);
		$description = $xml_description_fin[0];
		//image
		$xml_image_debut = explode('&lt;img src="',$xml_string,2);
		$xml_image_fin = explode('" width="',$xml_image_debut[1],2);
		$img = $xml_image_fin[0];
		//code HTML
		$code =
		'<embed style="width:400px; height:326px;" id="VideoPlayback"' .
		' type="application/x-shockwave-flash" src="http://video.google.com/googleplay' .
		'er.swf?docId='.$id.'&hl=fr" flashvars=""> </embed>';
	}
	else if ($type=="vimeo"){
		$xml_string = @file_get_contents("http://vimeo.com/api/clip/".$id.".xml"
		);
		//titre
		$xml_title_debut = explode("<title>",$xml_string,2);
		$xml_title_fin = explode("</title>",$xml_title_debut[1],2);
		$titre = $xml_title_fin[0];
		//description
		$xml_description_debut = explode("<caption>",$xml_string,2);
		$xml_description_fin = explode("</caption>",$xml_description_debut[1],2)
		;
		$description = $xml_description_fin[0];
		//image
		$xml_image_debut = explode("<thumbnail_large>",$xml_string,2);
		$xml_image_fin = explode("</thumbnail_large>",$xml_image_debut[1],2);
		$img = $xml_image_fin[0];
		//code HTML
		$xml_code = @file_get_contents(
				"http://vimeo.com/api/oembed.xml?url=http%3A//vimeo.com/".$id);
		$xml_code_debut = explode("<html>",$xml_code,2);
		$xml_code_fin = explode("</html>",$xml_code_debut[1],2);
		$code = str_replace("<![CDATA[","",str_replace("]]>","",$xml_code_fin[0]
		));
	}

	return array("id"=>$id,"type"=>$type,"titre"=>$titre,"description"=>
			$description,"img"=>$img,"code"=>$code);
}
	?>
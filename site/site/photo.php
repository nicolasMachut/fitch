<?php 
 	require_once'conf/requetesSQL.php';
 	$photos = getPhotos();
 	foreach($photos as $p)
 	{
 		echo'<center><ul style="list-style-type:none";><li><img src="media/photo/'.$p['pho_nom'].'"></li></ul></center>';
 	}
?>


 		


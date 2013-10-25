<?php 
	require_once'../conf/fonctions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Emilie Lesgourgues</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="../index.php?p=accueil">Emilie Lesgourgues</a>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Vidéos</li>
              <li class="active"><a href="index.php?p=addVideo">Ajouter une vidéo</a></li>
              <li><a href="index.php?p=removeVideo">Supprimer une vidéo</a></li>
              <li><a href="#">Modifier l'ordre des vidéos</a></li>
              <li class="nav-header">Photos</li>
              <li><a href="index.php?p=addPhoto">Ajouter une photo</a></li>
              <li><a href="#">Supprimer une photo</a></li>
              <li><a href="#">Modifier l'ordre des photos</a></li>
              <li class="nav-header">Music X Mixtapes</li>
              <li><a href="index.php?p=addMusic">Ajouter une musique</a></li>
              <li><a href="index.php?p=removeMusic">Supprimer une musique</a></li>
              <li><a href="#">Modifier l'ordre des musiques</a></li>
              <li class="nav-header">Contact</li>
              <li><a href="#">Modifier les informations</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Statistiques</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        
     <div class="container">
<?php 
	if(isset($_REQUEST['p']))
	{
		switch ($_REQUEST['p'])
		{
			case 'addVideo' :
				addVideo();
				break;
			case 'addMusic' :
				addMusic();
				break;
			case 'removeMusic':
				removeMusic();
				break;
			case 'removeVideo':
				removeVideo();
				break;
		}
	}
?>
<div id="message" style="display:none;"></div>
</div>
 </div><!--/row-->
      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->


<script>
	function addVideo()
	{	
		var lien = document.getElementById('lien').value;
		if(lien == '')
		{
		}
		else
		{
		    var xhr=null;
		    
		    if (window.XMLHttpRequest) { 
		        xhr = new XMLHttpRequest();
		    }
		    else if (window.ActiveXObject) 
		    {
		        xhr = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    //on appelle le fichier reponse.txt
		    xhr.open("GET", "/site/admin/addVideo.php?lien="+lien+"", false);
		    xhr.send(null);
			var message = document.getElementById('message');
			var newP = document.createElement('p');
			var newPText = document.createTextNode('La vidéo à bien été enregistrée.');
			message.style.display="block";
			message.className="alert alert-success";
			newP.appendChild(newPText);
			message.appendChild(newP);
		}
	}

	function removeMusic(id)
	{
		alert(id);
	}

	function removeVideo(id)
	{
		alert(id);
	}
</script>
  </body>
</html>


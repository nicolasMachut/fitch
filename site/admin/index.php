<?php 
session_start();
	if(isset($_SESSION['mail']))
	{
	
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
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

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
            <ul class="nav nav-list menu">
              <li class="nav-header">Vidéos</li>
              <li><a href="index.php?p=addVideo">Ajouter une vidéo</a></li>
              <li class="nav-header">Photos</li>
              <li><a href="index.php?p=addPhoto">Ajouter une photo</a></li>
              <li class="nav-header">Music X Mixtapes</li>
              <li><a href="index.php?p=addMusic">Ajouter une musique</a></li>
              <li class="nav-header">Générale</li>
              <li><a href="index.php?p=vignette">Vignettes</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Administration</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        
     <div class="container">
     <div id="message" style="display:none;"></div>
<?php 

	switch ($_REQUEST['p'])
	{
		case 'addVideo' :
			displayAddVideo();
			//displayVideo(1);
			break;
		case 'addMusic' :
			displayAddMusic();
			//displayMusic(1);
			break;
		case 'addPhoto';
			displayAddPhoto();
			break;
		case 'vignette';
			displayUpdateVignette();
			break;
		default:
			displayParDefaut();
	}

?>
<div id="displayVideo"></div>
<div id="displayMusic"></div>
<div id="displayPhoto"></div>

</div>
 </div><!--/row-->
      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->



<script type="text/javascript" src="../conf/fonctions.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->

<script>
</script>
  </body>
</html>
<?php 
	}
	else {
		echo'<h3>Vous devez vous identifier pour acceder a cette page</h3>';
		echo'<a href="../index.php?p=accueil">Retour</a>';
	}
?>

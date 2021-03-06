<?php 
session_start();
	require_once'conf/requetesSQL.php';
	require_once'conf/fonctions.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Emilie Lesgourgues</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 96.8%;
        font-family:Helvetica;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 1070px;
      }
      .container .credit {
        margin: 20px 0;
      }


    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>


    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
        <a href="index.php?p=accueil"><img src="media/logo/emilie.png"/></a>
      <a href="index.php?p=accueil"><img src="media/logo/logo.png"/></a>
        <?php 
        	if(isset($_SESSION['mail']))
        	{
        		echo '<i class="icon-off" onclick="deconnexionAdmin();";></i>';
        		echo '<a href="admin/index.php"><i class="icon-edit"></i></a>'; 
        		echo'<p>'.$_SESSION['mail'].' est connecté en tant qu\'administrateur.</p>';    		
        	}
        ?>
        </div>
        </div>
        <div class="container" style="margin-top:3%">
        <?php 
        	if( isset( $_REQUEST['p'] ) )
        		page($_REQUEST['p']);
        ?>
			</div>
		</div>
      <div id="push"></div>

    <div id="footer">
      <div class="container">
        <p class="muted credit"><a href="index.php?p=accueil">LESGOURGUES Emilie</a> and <a href="index.php?p=contact">MACHUT Nicolas</a>.</p>
      </div>
    </div>



<script type="text/javascript" src="conf/fonctions.js"></script>
  </body>
</html>
 

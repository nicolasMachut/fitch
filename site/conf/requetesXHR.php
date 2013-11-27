<?php
require_once'fonctions.php';
require_once'requetesSQL.php';

switch($_REQUEST['requete'])
{
	case "addVideo" : addVideo($_REQUEST['lien']);
		break;
	case"removeVideo": removeVideo($_REQUEST['id']);
		break;
	case'addMusic' : addMusic($_REQUEST['lien']);
		break;
	case'removeMusic' : removeMusic($_REQUEST['id']);
		break;
	case 'classementVideo' : echo updateClassementVideo($_REQUEST['sens']);
		break;
	case'loadDisplayVideo': displayVideo(1);
		break;
	case'loadDisplayMusic': displayMusic(1);
		break;
	case'addPhoto': addPhoto();
		break;
	case'loadDisplayPhoto' : displayPhoto(1);
		break;
	default;
}

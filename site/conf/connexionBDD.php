<?
	//Permet la connexion à la base de donnée
	try
	{
		//$bdd = new PDO('mysql:host=mysql51-97.perso;dbname=emilielefitch', 'emilielefitch', 'ExpjP2ml', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $bdd = new PDO('mysql:host=http://127.0.0.1/;dbname=emiliefitch', 'root', '812AJH', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

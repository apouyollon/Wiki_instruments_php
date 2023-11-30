<?php

// Liens vers la base de données
	$host = "127.0.0.1"; 
	$user = "b1";
	$database = "b1";
	$password  = "alanTuring";
// Connexion au serveur
	$connexion=mysqli_connect($host, $user, $password) or die("erreur de connexion au serveur");
	mysqli_select_db($connexion, $database) or die("erreur de connexion a la base de donnees");
?>

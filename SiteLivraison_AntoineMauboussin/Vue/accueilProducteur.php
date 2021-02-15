<!DOCTYPE html>
<html lang="fr">
                                        
	<head>
	    <meta charset="utf-8">
		<title>Accueil</title>
		<link rel="stylesheet" href="../Css/style.css" type="text/css"/>
	</head>
	<body>
		<div class="topnav">
		<a href=../Controleur/redirection.php>Accueil</a>
		<a href=../Controleur/deconnexion.php>Se déconnecter</a>
		<a href = "../vue/pageStock.php">Stocks</a>
		<a href = "../vue/pageCommandeProd.php">Commandes</a>
		<a href = "../vue/pagePanier.php">Gérer panier</a>
		</div>
		<div class="parent">
		<h1>Gestion</h1>
		<?php 
		
		session_start();
		
    		if(!empty($_GET['message']))
    		    echo($_GET['message']);
		?>
	</body>
</html>

<!DOCTYPE html>
<html lang="fr">
                                        
	<head>
	    <meta charset="utf-8">
		<title>Création de comptes</title>
		<link rel="stylesheet" href="../Css/style.css" type="text/css"/>
	</head>
	<body>
		<div class="topnav">
		<a href=../Controleur/redirection.php>Accueil</a>
		<a href = "../vue/pageConnexion.php">Se connecter</a>
		<a href = "../vue/pageCreation.php">Créer un compte</a>
		</div>
		<div class="parent">
		<h1>Créer un compte</h1>
		<?php 
    		if(!empty($_GET['message']))
    		    echo($_GET['message']);
		?>
		<form method="POST" action="../controleur/creation.php">
        	<label for="identifiant">Identifiant : </label>
            <input type="text" name="identifiant">
            <br />
            <label for="mdp">Mot de passe : </label>
            <input type="text" name="mdp">
            <br />
            <label for="mdp">Adresse : </label>
            <input type="text" name="adresse">
            <br />
            <label for="mdp">Quartier: </label>
            <input type="text" name="quartier">
            <br />
            <input type=submit value="Créer un compte">
        </form>
	</body>
</html>

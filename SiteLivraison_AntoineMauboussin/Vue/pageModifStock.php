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
		</div>
		<div class="parent">
		<h1>Stock</h1>
    		<?php 
    		require_once '../Modele/connect.php';
    		session_start();
    		echo("<form method=\"POST\" action=\"../controleur/modifStock.php?message=".$_GET["message"]."\">
            <label for=\"valeur\">Nouvelle valeur pour: ".$_GET["message"]."</label><br />
            <input type=\"number\" name=\"valeur\">
    		");
    		
    		
    		?>
    		
            <br/>
            <input type=submit value="Commander">
    	</form>
	</body>
</html>
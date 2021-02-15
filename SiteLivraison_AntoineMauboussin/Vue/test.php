<!DOCTYPE html>
<html lang="fr">
                                        
	<head>
	    <meta charset="utf-8">
		<title>Catalogue</title>
		<link rel="stylesheet" href="../Css/style4.css" type="text/css"/>
	</head>
	<body>
		<div class="topnav">
		<a href=../Controleur/redirection.php>Accueil</a>
		<a href=../Controleur/deconnexion.php>Se déconnecter</a>
		<a href = "../vue/pageCatalogue.php">Commander</a>
		<a href = "../vue/pageCommandeClient.php">Liste des commandes</a>
		</div>
		<div class="parent">
		<h1>Catalogue</h1>
		<?php 
    		if(!empty($_GET['message']))
    		    echo($_GET['message']);
		?>
			<?php
			require_once '../Modele/connect.php';
			session_start();
			
			$select = "Select * from Produit";
			$result = mysqli_query($connect, $select);
			$i = 0;
			
			echo("<ul class=\"listing\">");
			while($row = $result->fetch_assoc())
			{
			    echo("<li><label for=\"quantite\">".$row["nom"]."(".$row["prix"]."€/kg)"."</label>");
			    echo("<input type=\"number\" step=\"0.01\" min=0 name=\"quantite".$i."\"></li>");
			    $i++;
			}
			?>
			</ul>
            <br />
            <input type="checkbox" name="groupe" value="1">
            <label for="groupe">En attente de groupage (la commande ne sera pas confirmée tant que le groupage ne sera pas effectué, permet de réduire la quantité minimale)</label>
            <br/>
            <input type=submit value="Commander">
	</body>
</html>
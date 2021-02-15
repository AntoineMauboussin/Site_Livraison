<!DOCTYPE html>
<html lang="fr">
                                        
	<head>
	    <meta charset="utf-8">
		<title>Commande</title>
		<link rel="stylesheet" href="../Css/style.css" type="text/css"/>
	</head>
	<body>
		<div class="topnav">
		<a href=../Controleur/redirection.php>Accueil</a>
		<a href=../Controleur/deconnexion.php>Se déconnecter</a>
		<a href = "../vue/pageCatalogue.php">Commander</a>
		<a href = "../vue/pageCommandeClient.php">Liste des commandes</a>
		</div>
		<div class="parent">
		<h1>Commandes élligibles</h1>
		<p>Les commandes élligibles pour être groupées avec la commande choisies sont celles des autres clients qui sont en attente de groupage.</p>
		
    		<?php 
    		require_once '../Modele/connect.php';
    		session_start();
    		
    		$select = "Select * from Livraison join Client on idClient = identifiant where identifiant !='".$_SESSION["identifiant"]."' and numGroupe is null and numLivraison != 1";
    		$result = mysqli_query($connect, $select);
    		
    		$bin=1;
    		
    		while($row = $result->fetch_assoc())
    		{
    		    if($row["statut"] == "En attente")
    		    {
    		        if($bin)
    		        {
    		            echo("<table>
    		                <thead>
    		                <tr>
    		                <th>Numéro de commande</th>
    		                <th>Date</th>
    		                <th>Statut</th>
    		                </tr>
    		                </thead>");
    		        }
    		        echo(
    		        "<tbody>
    		        <tr>
    		        <td>".$row["numLivraison"]."</td>
                    <td>".$row["dateCommande"]."</td>
    		        <td>".$row["statut"]."</td>
    		        <td><a href=\"../Controleur/groupage.php?message1=".$_GET["message"]."&message2=".$row["numLivraison"]."\">Grouper</a></td>
                    </tr></tbody>"
    		        );
    		        $bin=0;
    		    }
    		}
    		
    		if($bin)
    		{
    		    echo("<p>Aucune commande élligible.</p>");
    		}
    		?>
		</table>
	</body>
</html>
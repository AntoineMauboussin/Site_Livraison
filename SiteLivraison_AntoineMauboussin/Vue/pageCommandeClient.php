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
		</div>
		<div class="parent">
		<h1>Commandes</h1>
		<?php 
    		if(!empty($_GET['message']))
    		    echo($_GET['message']);
		?>
		<table>
    		<thead>
    			<tr>
    				<th>Numéro de commande</th>
    				<th>Date</th>
    				<th>Statut</th>
    				<th>Frequence</th>
    			</tr>
    		</thead>
    		<?php 
    		require_once '../Modele/connect.php';
    		session_start();
    		
    		$select = "Select * from Livraison where idClient = '".$_SESSION["identifiant"]."'";
    		$result = mysqli_query($connect, $select);
    		
    		while($row = $result->fetch_assoc())
    		{
    		        echo(
    		        "<tbody>
    		        <tr>
    		        <td>".$row["numLivraison"]."</td>
                    <td>".$row["dateCommande"]."</td>
    		        <td>".$row["statut"]."</td>
                    <td>".$row["frequence"]."</td>
                    <td><a href=\"pageDetail.php?message=".$row["numLivraison"]."\">Détails</a></td>");
    		        if(!empty($row["numGroupe"]))
    		        {
    		            echo("<td><a href=\"../vue/pageDetailGroupe.php?message=".$row["numGroupe"]."\">Voir groupe</a></td>");
    		            
    		            if($row["statut"] == "En attente")
    		            {
    		                echo("<td><a href=\"../Controleur/confGroupe.php?message=".$row["numGroupe"]."\">Confirmer groupe</a></td>");
    		            }
    		        }
    		        if($row["statut"] == "En attente")
    		        {
    		                echo("<td><a href=\"../vue/pageGroupe.php?message=".$row["numLivraison"]."\">Grouper</a></td>");
                        echo("<td><a href=\"../Controleur/annuler.php?message=".$row["numLivraison"]."\">Annuler</a></td>");
                    }
                    if($row["statut"] == "Non confirmée")
                    {
                        echo("<td><a href=\"../Controleur/annuler.php?message=".$row["numLivraison"]."\">Annuler</a></td>");
                    }
    		        echo("</tr>
    		        </tbody>"
    		        );
    		}
    		?>
	</body>
</html>
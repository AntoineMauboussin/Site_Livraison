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
    				<th>Identifiant</th>
    			</tr>
    		</thead>
    		<?php 
    		require_once '../Modele/connect.php';
    		session_start();
    		
    		$select = "Select * from Livraison order by dateCommande";
    		$result = mysqli_query($connect, $select);
    		
    		echo("<p>Commandes simples</p>");
    		while($row = $result->fetch_assoc())
    		{
    		    
    		    if(empty($row["numGroupe"]) && $row["statut"] != "Livrée")
        		{
        		        echo(
        		        "
                        <tbody>
        		        <tr>
        		        <td>".$row["numLivraison"]."</td>
                        <td>".$row["dateCommande"]."</td>
                        <td>".$row["statut"]."</td>
                        <td>".$row["idClient"]."</td>
                        <td><a href=\"pageDetail.php?message=".$row["numLivraison"]."\">Détails</a></td>");
        		        
        		        if($row["statut"] == "Non confirmée"){
        		            
        		            echo("<td><a href=\"../Controleur/confirmer.php?message=".$row["numLivraison"]."\">Confirmer</a></td>
        		             ");
        		        }
        		        else
        		        {
        		            echo("<td><a href=\"../Controleur/livrer.php?message=".$row["numLivraison"]."\">Livrer</a></td>
        		             ");
        		        }
        		        

                        echo("</tr></tbody>"
        		        );
    		    }
    		}
    		
    		$select = "Select * from Livraison join Client on idClient = identifiant where numGroupe = numLivraison";
    		$result = mysqli_query($connect, $select);
    		echo("
                        </table><p>Commandes groupées</p><table>
    		<thead>
    			<tr>
    				<th>Numéro de commande</th>
    				<th>Date</th>
    				<th>Statut</th>
    			</tr>
    		</thead>");
    		while($row = $result->fetch_assoc())
    		{
    		    
    		    if(!empty($row["numGroupe"]) && $row["statut"] != "En attente" &&  $row["statut"] != "Livrée")
    		    {
    		        echo(
    		            "
                        <tbody>
        		        <tr>
        		        <td>".$row["numLivraison"]."</td>
                        <td>".$row["dateCommande"]."</td>
                        <td>".$row["statut"]."</td>
                        <td><a href=\"../vue/pageDetailGroupe.php?message=".$row["numGroupe"]."\">Voir groupe</a></td>");
                        if($row["statut"] == "Non confirmée"){
        		            
        		            echo("<td><a href=\"../Controleur/confirmer.php?message=".$row["numLivraison"]."\">Confirmer</a></td>
        		             ");
        		        }
        		        else
        		        {
        		            echo("<td><a href=\"../Controleur/livrer.php?message=".$row["numLivraison"]."\">Livrer</a></td>
        		             ");
        		        }
        		        echo("
        		        </tr>
        		        </tbody>"
    		            );
    		    }
    		}
    		?>
		</table>
	</body>
</html>
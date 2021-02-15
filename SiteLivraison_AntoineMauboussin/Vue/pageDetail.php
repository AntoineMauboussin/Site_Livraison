<!DOCTYPE html>
<html lang="fr">
                                        
	<head>
	    <meta charset="utf-8">
		<title>Détails de la commande</title>
		<link rel="stylesheet" href="../Css/style.css" type="text/css"/>
	</head>
	<body>
		<div class="topnav">
		<a href=../Controleur/redirection.php>Accueil</a>
		<a href=../Controleur/deconnexion.php>Se déconnecter</a>
		</div>
		<div class="parent">
		<h1>Détails de la commande</h1>
		<table>
    		<thead>
    			<tr>
    				<th>Produit</th>
    				<th>Quantité</th>
    				<th>Prix</th>
    				<?php
    				session_start();
    		           echo("<th>Identifiant Client</th>"
    		               );
    				
    				?>
    			</tr>
    		</thead>
    		<?php 
    		require_once '../Modele/connect.php';
    		
    		$select = "Select * from Client Join Livraison on Identifiant=idClient natural join Contient natural join Produit where numLivraison ='".$_GET['message']."'";
    		$result = mysqli_query($connect, $select);
    		
    		
    		while($row = $result->fetch_assoc())
    		{
    		        $prix = $row["prix"]*$row["quantite"];
    		        echo(
    		        "<tbody>
    		        <tr>
    		        <td>".$row["nom"]."</td>
                    <td>".$row["quantite"]."kg</td>
    		        <td>".$prix."€</td>");
    		           echo("<td>".$row["identifiant"]."</td>"
    		               );
    		       echo("</tr>
    		        </tbody>"
    		        );
    		}
    		?>
		</table>
	</body>
</html>
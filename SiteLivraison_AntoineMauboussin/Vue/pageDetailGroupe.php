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
    				<th>Identifiant</th>
    				<?php
    				session_start();
    				if($_SESSION["estProducteur"])
    		        {
    		           echo("<th>Identifiant Client</th>"
    		               );
    		        }
    				
    				?>
    			</tr>
    		</thead>
    		<?php 
    		require_once '../Modele/connect.php';
    		
    		$select = "Select * from Livraison where numGroupe ='".$_GET['message']."'";
    		$result = mysqli_query($connect, $select);
    		
    		while($row = $result->fetch_assoc())
    		{
    		    
    		    
    		    echo(
    		        "<tbody>
    		        <tr>
    		        <td>".$row["numLivraison"]."</td>
                    <td>".$row["dateCommande"]."</td>
    		        <td>".$row["statut"]."</td>
                    <td>".$row["idClient"]."</td>
                    <td><a href=\"pageDetail.php?message=".$row["numLivraison"]."\">Détails</a></td>");
    		    echo("</tr>
    		        </tbody>"
    		        );
    		}
    		?>
		</table>
	</body>
</html>
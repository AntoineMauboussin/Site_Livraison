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
		<table>
    		<thead>
    			<tr>
    				<th>Nom</th>
    				<th>Famille</th>
    				<th>Stock (kg)</th>
    				<th>Prix (€)</th>
    			</tr>
    		</thead>
    		<?php 
    		require_once '../Modele/connect.php';
    		session_start();
    		
    		$select = "Select * from Produit";
    		$result = mysqli_query($connect, $select);
    		
    		while($row = $result->fetch_assoc())
    		{
    		    echo(
    		        "<tbody>
    		        <tr>
    		        <td>".$row["nom"]."</td>
    		        <td>".$row["famille"]."</td>
    		        <td>".$row["stock"]."</td>
    		        <td>".$row["prix"]."</td>
                    <td><a href=\"../Vue/pageModifStock.php?message=".$row["nom"]."\">Modifier stock</a></td>
    		        </tr>
    		        </tbody>"
    		        );
    		}
    		?>
		</table>
	</body>
</html>
<!DOCTYPE html>
<html lang="fr">
                                        
	<head>
	    <meta charset="utf-8">
		<title>Gestion du panier</title>
		<link rel="stylesheet" href="../Css/style5.css" type="text/css"/>
	</head>
	<body>
		<div class="topnav">
		<a href=../Controleur/redirection.php>Accueil</a>
		<a href=../Controleur/deconnexion.php>Se déconnecter</a>
		</div>
		<div class="parent">
		<h1>Gestion du panier</h1>
		<?php 
    		if(!empty($_GET['message']))
    		    echo($_GET['message']);
		?>
		<form method="POST" action="../controleur/panier.php">
			<?php
			require_once '../Modele/connect.php';
			session_start();
			
			$select = "Select * from Produit";
			$result = mysqli_query($connect, $select);
			$i = 0;
			
			echo("<ul class=\"listing\">");
			while($row = $result->fetch_assoc())
			{
			    echo("<li><img src=\"".$row["image"]."\"><label for=\"quantite\">".$row["nom"]."(".$row["prix"]."€/kg)"."</label>");
			    echo("<input type=\"number\" step=\"0.01\" min=0 name=\"quantite".$i."\"></li>");
			    $i++;
			}
			?>
			</ul>
            <input type=submit value="Changer panier">
        </form>
	</body>
</html>

<!DOCTYPE html>
<html lang="fr">
                                        
	<head>
	    <meta charset="utf-8">
		<title>Catalogue</title>
		<link rel="stylesheet" href="../Css/style5.css" type="text/css"/>
	</head>
	<body>
		<div class="topnav">
		<a href=../Controleur/redirection.php>Accueil</a>
		<a href=../Controleur/deconnexion.php>Se déconnecter</a>
		</div>
		<div class="parent">
		<h1>Catalogue</h1>
		<?php 
    		if(!empty($_GET['message']))
    		    echo($_GET['message']);
		?>
		<form method="POST" action="../controleur/catalogue.php">
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
            <br />
            <input type="checkbox" name="groupe" value="1">
            <label for="groupe">En attente de groupage (la commande ne sera pas confirmée tant que le groupage ne sera pas effectué, permet de réduire la quantité minimale)</label>
            <br />
            <br />
            <input type="radio" name="frequence" value="Ponctuelle">
              <label for="frequence">Ponctuelle</label><br>
              <input type="radio" name="frequence" value="Hebdomadaire">
              <label for="female">Hebdomadaire</label><br>
              <input type="radio" name="frequence" value="Mensuelle">
              <label for="other">Mensuelle</label>
              <br />
              <input type="radio" name="frequence" value="Panier">
              <label for="other">Panier</label>
            <br/>
            <br/>
            <input type=submit value="Commander">
        </form>
	</body>
</html>

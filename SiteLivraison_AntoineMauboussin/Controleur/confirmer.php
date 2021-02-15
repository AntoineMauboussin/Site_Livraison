<?php 

require_once '../Modele/connect.php';
require_once '../Modele/membre.php';

session_start();


$update = "Update Livraison Set statut='Confirmée' where numLivraison = ".$_GET["message"];
mysqli_query($connect, $update) or die("Erreur lors de l'insertion");
    
header("Location:../vue/pageCommandeProd.php?message=Commande confirmée");

?>
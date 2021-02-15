<?php 

require_once '../Modele/connect.php';
require_once '../Modele/membre.php';

session_start();


$update = "Update Livraison Set statut='Non confirmée' where numGroupe = ".$_GET["message"];
mysqli_query($connect, $update) or die("Erreur lors de l'insertion");
    
header("Location:../vue/pageCommandeClient.php?message=Commande confirmée");

?>
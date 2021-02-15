<?php
require_once '../Modele/connect.php';

session_start();


$update = "Update Livraison Set numGroupe = ".$_GET["message1"]." where numLivraison = ".$_GET["message1"]."";
mysqli_query($connect, $update) or die("Erreur lors de la requête1");

$update = "Update Livraison Set numGroupe = '".$_GET["message1"]."' where numLivraison = ".$_GET["message2"]."";
mysqli_query($connect, $update) or die("Erreur lors de la requête2");

header("Location:../vue/accueilMembre.php?message=Commandes groupées");
?>
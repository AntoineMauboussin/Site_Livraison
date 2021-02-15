<?php 

require_once '../Modele/connect.php';
session_start();

$delete = "Delete from Contient where numLivraison =".$_GET["message"];
mysqli_query($connect, $delete) or die("Erreur lors de la suppression");
$delete = "Delete from Livraison where numLivraison =".$_GET["message"];
mysqli_query($connect, $delete) or die("Erreur lors de la suppression");

header("location:../Vue/pageCommandeClient.php");
?>
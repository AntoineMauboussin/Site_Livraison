<?php
require_once '../Modele/connect.php';

session_start();

$update = "Update Produit Set stock = '".$_POST["valeur"]."' where nom = '".$_GET["message"]."'";
mysqli_query($connect, $update) or die("Erreur lors de la requête1");

header("Location:../vue/pageStock.php?message=Stock mis à jour");
?>
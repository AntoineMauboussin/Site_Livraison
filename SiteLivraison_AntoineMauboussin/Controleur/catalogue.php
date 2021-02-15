<?php 

require_once '../Modele/connect.php';
require_once '../Modele/membre.php';

session_start();

$i = 0;

$select = "Select * from Produit";
$result = mysqli_query($connect, $select);
$total = 0;

while($row = $result->fetch_assoc())
{
    if(!empty($_POST["quantite".$i]))
    {
        $total += $_POST["quantite".$i];
    }
    
    $i++;
}

if(!isset($_POST["groupe"]))
{
    $insert = "Insert into Livraison (idClient, dateCommande, frequence) values ('".$_SESSION["identifiant"]."',SYSDATE(), '".$_POST["frequence"]."')";
    $max = 0.5;
}
else
{
    $insert = "Insert into Livraison (idClient, dateCommande, statut, frequence) values ('".$_SESSION["identifiant"]."',SYSDATE(), 'En attente', '".$_POST["frequence"]."')";
    $max = 0.1;
}

if($total < $max &&  $_POST["frequence"] != "Panier")
{
    header("Location:../vue/pageCatalogue.php?message=Quantité insuffisante");
}
else
{
    $i = 0;
    $result = mysqli_query($connect, $select);
    mysqli_query($connect, $insert) or die("Erreur lors de l'insertion");
    
    while($row = $result->fetch_assoc())
    {
        if(!empty($_POST["quantite".$i]) && $_POST["frequence"] != "Panier")
        {
            $j = $i+1;
            $insert = "Insert into Contient values (LAST_INSERT_ID(),'".$j."','".$_POST["quantite".$i]."')";
            mysqli_query($connect, $insert) or die("Erreur lors de l'insertion");
        }
        
        $i++;
    }
    
    header("Location:../vue/accueilMembre.php?message=Commande validée");
}


?>
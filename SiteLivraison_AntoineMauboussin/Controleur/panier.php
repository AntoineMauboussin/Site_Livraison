<?php 

require_once '../Modele/connect.php';
require_once '../Modele/membre.php';

session_start();

$delete = "Delete from Contient where numLivraison = 1";
$result = mysqli_query($connect, $delete);
$select = "Select * from Produit";
$result = mysqli_query($connect, $select);
$i = 0;

while($row = $result->fetch_assoc())
{
    if(!empty($_POST["quantite".$i]))
    {
        $j = $i+1;
        $insert = "Insert into Contient values (1,".$j.",".$_POST["quantite".$i].")";
        mysqli_query($connect, $insert) or die("Erreur lors de l'insertion");
    }
    
    $i++;
}

header("Location:../vue/accueilProducteur.php?message=Panier modifié");
?>
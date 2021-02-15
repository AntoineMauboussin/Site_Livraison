<?php 

require_once '../Modele/connect.php';
require_once '../Modele/membre.php';

$bin = 0;

if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"]) && !empty($_POST["adresse"]) && !empty($_POST["quartier"]))
{
    $identifiant = $_POST["identifiant"];
    $mdp = $_POST["mdp"];
    $adresse = $_POST["adresse"];
    $quartier = $_POST["quartier"];
    
    $select = "Select * from Client";
    $result = mysqli_query($connect, $select);
    
    while($row = $result->fetch_assoc())
    {
        if($row["identifiant"] == $identifiant)
        {
            header("Location:../vue/pageCreation.php?message=Cet indentifiant est déjà utilisé");
            $bin = 1;
            break;
        }
    }
    
}
else
{
    header("Location:../vue/pageCreation.php?message=Tous les champs doivent être remplis");
    $bin = 1;
}

if($bin == 0)
{
    $insert = "Insert Into Client (identifiant, mdp, adresse, quartier) Values ('$identifiant', '$mdp', '$adresse', '$quartier')";
    mysqli_query($connect, $insert) or die("Erreur lors de la création");
    $membre = new membre($connect, $identifiant, $mdp);
    $membre->connexion();
    header("Location:../vue/accueilMembre.php?message=Le compte à été créé avec succès");
}

?>
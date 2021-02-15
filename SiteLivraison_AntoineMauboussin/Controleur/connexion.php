<?php 

require_once '../Modele/connect.php';
require_once '../Modele/membre.php';

$bin = 0;

if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"]))
{
    $identifiant = $_POST["identifiant"];
    $mdp = $_POST["mdp"];
    
    $select = "Select * from Client";
    $result = mysqli_query($connect, $select);
    
    while($row = $result->fetch_assoc())
    {
        if($row["identifiant"] == $identifiant && $row["mdp"] == $mdp)
        {
            $membre = new membre($connect, $identifiant, $mdp);
            $membre->connexion();
            $bin = 1;
            if(!$row["estProducteur"])
            {
                header("Location:../vue/accueilMembre.php");
            }
            else
            {
                header("Location:../vue/accueilProducteur.php");
            }
            break;
        }
    }
}

if($bin == 0)
{
    header("Location:../vue/pageConnexion.php?message=Identifiant ou mot de passe invalide");
}

?>
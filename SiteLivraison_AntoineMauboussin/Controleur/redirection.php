<?php 
session_start();

if(empty($_SESSION["identifiant"]))
{
    header("Location:../vue/accueil.php");
}
else{
    if($_SESSION["estProducteur"]==1)
    {
        header("Location:../vue/accueilProducteur.php");
    }
    else
    {
        header("Location:../vue/accueilMembre.php");
    }
}
?>
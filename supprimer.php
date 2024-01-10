<?php
    include("connexion.php");

    $num = $_GET['id'];

    $requete1 = "DELETE FROM etudiant WHERE matricule = $num";
    if ($bdd->query($requete1)==true) {
        header("location:index.php");
    }
    else {
        echo ("Echec de suppression ");
    }
?>
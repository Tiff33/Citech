<?php 
include("connexion.php");
if (empty($_POST['nom']) || empty($_POST['prenom']) ||empty($_POST['filiere']))
{
    echo("Veuillez remplir les champs");
}
else {
    $n= $_POST['nom'];
    $p = $_POST['prenom'];
    $f = $_POST['filiere'];
   

    $requete = "INSERT INTO ETUDIANT VALUES
        (0,'$n','$p','$f')";

    if ($bdd->query($requete)==true) {
        header("location:index.php");
    }
    else {
        echo(" Echec de l'enregistrement ");
    }
}
?>
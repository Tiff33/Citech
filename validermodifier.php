<?php 
include("connexion.php");
if (empty($_POST['nom']) || empty($_POST['prenom']) ||empty($_POST['filiere']))
{
    echo("Veuillez remplir les champs");
}
else {
    $n = $_POST['nom'];
    $p = $_POST['prenom'];
    $f = $_POST['filiere'];
    $num = $_POST['matricule'];

    $requete = "UPDATE etudiant SET
    nom = '$n',
    prenom = '$p',
    filiere = '$f'
    WHERE matricule='$num'";

    if ($bdd->query($requete)==true) {
        header("location:index.php");
    }
    else {
        echo(" Echec de l'enregistrement ");
    }
}
?>
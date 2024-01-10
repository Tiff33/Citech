<?php
    include("connexion.php");
    $name = $_GET['nom'];
    $prenom=$_GET['prenom'];
    $filiere=$_GET['filiere'];
    $requete = "SELECT * FROM etudiant WHERE nom LIKE '$name%' AND prenom LIKE '$prenom%' AND filiere LIKE '$filiere%'";
    $reponse = $bdd->query($requete);
    $ans = $reponse->fetchAll();
    //echo $_GET['nom'];
    foreach($ans as $r){
        echo '
    <tr>
    <th scope="row">'.$r['matricule'].'</th>
        <td>'.$r['nom'].'</td>
        <td>'.$r['prenom'].'</td>
        <td>'.$r['filiere'].'</td>
    </tr>';
    }
?>
<?php
    include("connexion.php");
    $requete = "SELECT * FROM etudiant";
    $reponse = $bdd->query($requete);
    $donnees = $reponse->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Liste des Etudiants</title>
</head>
<body>
    <div class="container">
        <h2>Liste des Etudiants</h2>
        <a href="create.php" class="btn btn-primary" style="background-color:#00d690; border-color:#00d690">
            <i class="fas fa-plus"></i> Nouveau
        </a>
        <br><br>
        <table class="table table-bordered">
            <thead  style="background-color:#1d293e; color:white">
                <tr>
                    <th>Nom et prénom</th>
                    <th>Filière</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donnees as $etudiant) { ?>
                    <tr>
                        <td><?= $etudiant['nom'] ?> <?= $etudiant['prenom'] ?></td>
                        <td><?= $etudiant['filiere'] ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $etudiant['matricule'] ?>" class="btn btn-warning" style="background:white; border:#00d690">
                                <i class="fas fa-edit" style="color:#00d690"></i>
                            </a>
                            <button class="btn btn-danger" onclick="confirmer(<?= $etudiant['matricule'] ?>)" style="background:white; border:white">
                                <i class="fas fa-trash-alt" style="color:red"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmer(Oeuvreid) {
            var res = confirm("Voulez-vous vraiment supprimer ?");
            if (res) {
                window.location.href = "supprimer.php?id=" + Oeuvreid;
            }
        }
    </script>
</body>
</html>

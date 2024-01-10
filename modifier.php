<?php
    include("connexion.php");

    $num = $_GET['id'];
    $requete3 = "SELECT * FROM etudiant WHERE matricule= $num";
    $reponse3 = $bdd->query($requete3);
    $donnees3 = $reponse3->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Modification d'un Etudiant</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Modifier un Etudiant</h2>
        <form action="validermodifier.php" method="post" onsubmit="convertirFormulaire()">
            <?php foreach ($donnees3 as $etudiant): ?>
            <fieldset class="border p-2">
                <legend class="text-primary">Etudiant</legend>

                <div class="mb-3">
                    <label for="matricule" class="form-label">Identifiant</label>
                    <input type="text" id="matricule" name="matricule" class="form-control" value="<?= $etudiant['matricule'] ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="<?= $etudiant['nom'] ?>">
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $etudiant['prenom'] ?>">
                </div>

                <div class="mb-3">
                    <label for="filiere" class="form-label">Filiere</label>
                    <input type="text" id="filiere" name="filiere" class="form-control" value="<?= $etudiant['filiere'] ?>">
                </div>
            </fieldset>
            <?php endforeach; ?>
            <div class="mt-3">
                <input type="submit" class="btn btn-primary" value="Modifier">
                <input type="reset" class="btn btn-secondary" value="Annuler">
            </div>
        </form>
    </div>

    <script>
        function convertirFormulaire() {
            // Convertir le nom en majuscules
            var nomInput = document.getElementById('nom');
            nomInput.value = nomInput.value.toUpperCase();

            // Mettre la première lettre du prénom en majuscule
            var prenomInput = document.getElementById('prenom');
            prenomInput.value = prenomInput.value.charAt(0).toUpperCase() + prenomInput.value.slice(1);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
  
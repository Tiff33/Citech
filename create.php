    <?php
include("connexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Ajout d'un Etudiant</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Ajoutez un Etudiant</h2>
        <form action="validercreate.php" method="post" onsubmit="convertirFormulaire()">
            <div class="mb-3">
                <label for="nom" class="form-label" >Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" onchange="seach()">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenoms</label>
                <input type="text" class="form-control" id="prenom" name="prenom" onchange="seach()">
            </div>
            <div class="mb-3">
                <label for="filiere" class="form-label">Filiere</label>
                <input type="text" class="form-control" id="filiere" name="filiere" onchange="seach()">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Ajouter">
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

    <!-- Intégration de Bootstrap JS (optionnel) -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <div class="container mt-5">
        <h2>Filtre</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Filiere</th>
                </tr>
            </thead>
            <tbody id="table">
               
               
                
            </tbody>
        </table>
    </div>

    <!-- Intégration de Bootstrap JS (optionnel) -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>

        function chercher(){
            console.log("ok");
            var nom = document.getElementById("nom").value;
            var prenom = document.getElementById("prenom").value;
            var filiere = document.getElementById("filiere").value;
            var tableau = document.getElementById("table");
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){
                    tableau.innerHTML = this.responseText;
                }
            };
            request.open("GET", "trouver.php?nom="+nom+"&prenom="+prenom+"&filiere="+filiere, true);
            request.send();
        }

        function seach(){
            var target = document.getElementById("nom").addEventListener("input", event=> chercher());
            var target = document.getElementById("prenom").addEventListener("input", event=> chercher());
            var target = document.getElementById("filiere").addEventListener("input", event=> chercher());
        }
    </script>
</body>
</html>

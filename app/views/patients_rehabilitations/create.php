<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Patient</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des patients</a>
    <h1>Ajouter un Patient</h1>

    <form action="create.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="priorite">Priorite:</label>
        <input type="number" id="priorite" name="priorite" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
    require_once '../../models/PatientsRehabilitation.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $departement = new PatientsRehabilitation();
        $departement->nom = $_POST['nom'];
        $departement->prenom = $_POST['prenom'];
        $departement->priorite = $_POST['priorite'];
        if ($departement->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p class='error'>Erreur lors de l'ajout du patient.</p>";
        }
    }
    ?>
</body>
</html>

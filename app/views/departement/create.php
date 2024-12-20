<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Département</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des départements</a>
    <h1>Ajouter un Département</h1>

    <form action="create.php" method="post">
        <label for="departement_nom">Nom:</label>
        <input type="text" id="departement_nom" name="departement_nom" required>
        <br>
        <label for="departement_description">Description:</label>
        <textarea id="departement_description" name="departement_description" required></textarea>
        <br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
    require_once '../../models/Departement.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $departement = new Departement();
        $departement->departement_nom = $_POST['departement_nom'];
        $departement->departement_description = $_POST['departement_description'];
        if ($departement->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p class='error'>Erreur lors de l'ajout du département.</p>";
        }
    }
    ?>
</body>
</html>

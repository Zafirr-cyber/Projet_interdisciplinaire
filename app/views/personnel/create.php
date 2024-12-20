<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un personnel</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste du personnel</a>
    <h1>Ajouter un personnel</h1>

    <form action="create.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="prenom">Prenom:</label>
        <textarea id="prenom" name="prenom" required></textarea>
        <br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
    require_once '../../models/Personnel.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $personnel = new Personnel();
        $personnel->nom = $_POST['nom'];
        $personnel->prenom = $_POST['prenom'];
        if ($personnel->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p class='error'>Erreur lors de l'ajout du personnel.</p>";
        }
    }
    ?>
</body>
</html>

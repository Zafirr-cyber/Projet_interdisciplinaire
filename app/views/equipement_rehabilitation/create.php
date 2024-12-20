<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un equipement</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des equipements</a>
    <h1>Ajouter un equipement</h1>

    <form action="create.php" method="post">
        <label for="type_equipement">type_equipement:</label>
        <select name="type_equipement" id="type_equipement" required>
        <option value="haltere">haltere</option>
        <option value="elastique">elastique</option>
        <option value="fauteuil">fauteuil</option>
        </select>
        <br>
        <label for="disponible">disponible:</label>
        <textarea id="disponible" name="disponible" required></textarea>
        <br>
        <label for="date_modification">date_modification:</label>
        <input type="text" id="date_modification" name="date_modification" required>
        <br>
        <label for="departement_id">departement_id:</label>
        <input type="text" id="departement_id" name="departement_id" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
    require_once '../../models/EquipementRehabilitation.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $personnel = new EquipementRehabilitation();
        $personnel->type_equipement = $_POST['type_equipement'];
        $personnel->disponible = $_POST['disponible'];
        $personnel->date_modification = $_POST['date_modification'];
        $personnel->departement_id = $_POST['departement_id'];
        if ($personnel->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p class='error'>Erreur lors de l'ajout de l'equipement.</p>";
        }
    }
    ?>
</body>
</html>

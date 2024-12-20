<?php
require_once '../../models/EquipementRehabilitation.php';
$equipement = new EquipementRehabilitation();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $currentequipement = $equipement->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipement->equipement_id = $_POST['equipement_id'];
    $equipement->type_equipement = $_POST['type_equipement'];
    $equipement->disponible = $_POST['disponible'];
    $equipement->date_modification = $_POST['date_modification'];
    $equipement->departement_id = $_POST['departement_id'];

    if ($equipement->update()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la modification du equipement.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un equipement</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des equipements</a>
    <h1>Modifier un equipement</h1>

    <?php if (isset($currentequipement)): ?>
        <form action="update.php" method="post">
            <input type="hidden" name="equipement_id" value="<?php echo htmlspecialchars($currentequipement['equipement_id']); ?>">
            <label for="type_equipement">type_equipement:</label>
            <select name="type_equipement" id="type_equipement" required>
            <option value="haltere">haltere</option>
            <option value="elastique">elastique</option>
            <option value="fauteuil">fauteuil</option>
            </select>
            <br>
            <label for="disponible">disponible:</label>
            <textarea id="disponible" name="disponible" required><?php echo htmlspecialchars($currentequipement['disponible']); ?></textarea>
            <br>
            <label for="date_modification">date_modification:</label>
            <textarea id="date_modification" name="date_modification" required><?php echo htmlspecialchars($currentequipement['date_modification']); ?></textarea>
            <br>
            <label for="departement_id">departement_id:</label>
            <textarea id="departement_id" name="departement_id" required><?php echo htmlspecialchars($currentequipement['departement_id']); ?></textarea>
            <br>
            <button type="submit">Modifier</button>
        </form>
    <?php else: ?>
        <p class="error">equipement non trouvé.</p>
    <?php endif; ?>
</body>
</html>

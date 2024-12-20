<?php
require_once '../../models/Departement.php';
$departement = new Departement();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $currentDepartement = $departement->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $departement->departement_id = $_POST['departement_id'];
    $departement->departement_nom = $_POST['departement_nom'];
    $departement->departement_description = $_POST['departement_description'];

    if ($departement->update()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la modification du département.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Département</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des départements</a>
    <h1>Modifier un Département</h1>

    <?php if (isset($currentDepartement)): ?>
        <form action="update.php" method="post">
            <input type="hidden" name="departement_id" value="<?php echo htmlspecialchars($currentDepartement['departement_id']); ?>">
            <label for="departement_nom">Nom:</label>
            <input type="text" id="departement_nom" name="departement_nom" value="<?php echo htmlspecialchars($currentDepartement['departement_nom']); ?>" required>
            <br>
            <label for="departement_description">Description:</label>
            <textarea id="departement_description" name="departement_description" required><?php echo htmlspecialchars($currentDepartement['departement_description']); ?></textarea>
            <br>
            <button type="submit">Modifier</button>
        </form>
    <?php else: ?>
        <p class="error">Département non trouvé.</p>
    <?php endif; ?>
</body>
</html>

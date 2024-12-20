<?php
require_once '../../models/Personnel.php';
$personnel = new Personnel();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $currentPersonnel = $personnel->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personnel->personnel_medical_id = $_POST['personnel_medical_id'];
    $personnel->nom = $_POST['nom'];
    $personnel->prenom = $_POST['prenom'];

    if ($personnel->update()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la modification du personnel.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un personnel</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des personnels</a>
    <h1>Modifier un personnel</h1>

    <?php if (isset($currentPersonnel)): ?>
        <form action="update.php" method="post">
            <input type="hidden" name="personnel_medical_id" value="<?php echo htmlspecialchars($currentPersonnel['personnel_medical_id']); ?>">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($currentPersonnel['nom']); ?>" required>
            <br>
            <label for="prenom">Prenom:</label>
            <textarea id="prenom" name="prenom" required><?php echo htmlspecialchars($currentPersonnel['prenom']); ?></textarea>
            <br>
            <button type="submit">Modifier</button>
        </form>
    <?php else: ?>
        <p class="error">personnel non trouvé.</p>
    <?php endif; ?>
</body>
</html>

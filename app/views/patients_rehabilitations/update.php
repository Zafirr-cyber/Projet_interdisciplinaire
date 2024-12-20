<?php
require_once '../../models/PatientsRehabilitation.php';
$patient = new PatientsRehabilitation();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $currentPatient = $patient->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient->patient_id = $_POST['patient_id'];
    $patient->nom = $_POST['nom'];
    $patient->prenom = $_POST['prenom'];
    $patient->priorite = $_POST['priorite'];

    if ($patient->update()) {
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
    <title>Modifier un Patient</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des départements</a>
    <h1>Modifier un Patient</h1>

    <?php if (isset($currentPatient)): ?>
        <form action="update.php" method="post">
            <input type="hidden" name="patient_id" value="<?php echo htmlspecialchars($currentPatient['patient_id']); ?>">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($currentPatient['nom']); ?>" required>
            <br>
            <label for="prenom">Prenom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($currentPatient['prenom']); ?>"required>
            <br>
            <label for="priorite">priorite:</label>
            <input type="number" id="priorite" name="priorite" value="<?php echo htmlspecialchars($currentPatient['priorite']); ?>"required>
            <br>
            <button type="submit">Modifier</button>
        </form>
    <?php else: ?>
        <p class="error">Patient non trouvé.</p>
    <?php endif; ?>
</body>
</html>

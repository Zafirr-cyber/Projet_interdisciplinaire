<?php
require_once '../../models/Suivi.php';
$suivi = new Suivi();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $currentSuivi = $suivi->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $suivi->id_suivi = $_POST['id_suivi'];
    $suivi->date_sortie = $_POST['date_sortie'];

    if ($suivi->update()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la modification du suivi.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un suivi</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des personnels</a>
    <h1>Modifier un suivi</h1>

    <?php if (isset($currentSuivi)): ?>
        <form action="update.php" method="post">
            <input type="hidden" name="id_suivi" value="<?php echo htmlspecialchars($currentSuivi['id_suivi']); ?>">
            <label for="date_sortie">Nom:</label>
            <input type="text" id="date_sortie" name="date_sortie" required>
            <br>
            <button type="submit">Modifier</button>
        </form>
    <?php else: ?>
        <p class="error">suivi non trouvé.</p>
    <?php endif; ?>
</body>
</html>

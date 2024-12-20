<?php
require_once '../../models/LitsRehabilitation.php';
$lit = new LitsRehabilitation();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $currentlit = $lit->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lit->lit_id = $_POST['lit_id'];
    $lit->type_lit = $_POST['type_lit'];
    $lit->disponible = $_POST['disponible'];
    $lit->date_modification = $_POST['date_modification'];
    $lit->date_creation = $_POST['date_creation'];

    if ($lit->update()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la modification du lit.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un lit</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des equipements</a>
    <h1>Modifier un lit</h1>

    <?php if (isset($currentlit)): ?>
        <form action="update.php" method="post">
            <input type="hidden" name="lit_id" value="<?php echo htmlspecialchars($currentlit['lit_id']); ?>">
            <label for="type_lit">type_lit:</label>
            <select name="type_lit" id="type_lit" required>
            <option value="standard">standard</option>
            <option value="intensif">intensif</option>
            <option value="pediatrique">pediatrique</option>
            </select>
            <br>
            <label for="disponible">disponible:</label>
            <textarea id="disponible" name="disponible" required><?php echo htmlspecialchars($currentlit['disponible']); ?></textarea>
            <br>
            <label for="date_modification">date_modification:</label>
            <input type="date" id="date_modification" name="date_modification" required><?php echo htmlspecialchars($currentlit['date_modification']); ?></textarea>
            <br>
            <label for="date_creation">date_creation:</label>
            <input type="date" id="date_creation" name="date_creation" required><?php echo htmlspecialchars($currentlit['date_creation']); ?></textarea>
            <br>
            <button type="submit">Modifier</button>
        </form>
    <?php else: ?>
        <p class="error">lit non trouvé.</p>
    <?php endif; ?>
</body>
</html>

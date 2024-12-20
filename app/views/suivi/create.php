<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un suivi</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste du suivi</a>
    <h1>Ajouter un suivi</h1>

    <form action="create.php" method="post">
        <label for="date_entree">date_entree:</label>
        <input type="text" id="date_entree" name="date_entree" required>
        <br>
        <label for="date_mesure">date_mesure:</label>
        <textarea type="date" id="date_mesure" name="date_mesure" required></textarea>
        <br>
        <label for="id_patient">id_patient:</label>
        <textarea type="date" id="id_patient" name="id_patient" required></textarea>
        <br>
        <label for="progression">progression:</label>
        <textarea id="progression" name="progression" required></textarea>
        <br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
    require_once '../../models/Suivi.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $suivi = new Suivi();
        $suivi->date_entree = $_POST['date_entree'];
        $suivi->date_mesure = $_POST['date_mesure'];
        $suivi->id_patient = $_POST['id_patient'];
        $suivi->progression = $_POST['progression'];
        if ($suivi->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p class='error'>Erreur lors de l'ajout du suivi.</p>";
        }
    }
    ?>
</body>
</html>

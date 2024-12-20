<?php
require_once '../../models/Suivi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $suivi = new Suivi();
    if ($suivi->delete($_GET['id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la suppression du suivi.</p>";
    }
}
?>

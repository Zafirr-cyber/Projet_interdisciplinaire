<?php
require_once '../../models/EquipementRehabilitation.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $equipement = new EquipementRehabilitation();
    if ($equipement->delete($_GET['id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la suppression du département.</p>";
    }
}
?>

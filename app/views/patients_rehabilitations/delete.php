<?php
require_once '../../models/PatientsRehabilitation.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $patient = new PatientsRehabilitation();
    if ($patient->delete($_GET['id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la suppression du département.</p>";
    }
}
?>

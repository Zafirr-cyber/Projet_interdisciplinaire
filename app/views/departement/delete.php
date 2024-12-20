<?php
require_once '../../models/Departement.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $departement = new Departement();
    if ($departement->delete($_GET['id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la suppression du département.</p>";
    }
}
?>

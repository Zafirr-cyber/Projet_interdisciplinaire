<?php
require_once '../../models/Personnel.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $personnel = new Personnel();
    if ($personnel->delete($_GET['id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la suppression du département.</p>";
    }
}
?>

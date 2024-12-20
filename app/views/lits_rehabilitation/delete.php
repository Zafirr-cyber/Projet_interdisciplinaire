<?php
require_once '../../models/LitsRehabilitation.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $lit = new LitsRehabilitation();
    if ($lit->delete($_GET['id'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Erreur lors de la suppression du lit.</p>";
    }
}
?>

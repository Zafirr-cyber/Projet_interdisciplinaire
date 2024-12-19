<?php

require '../../controllers/DepartementController.php';
    $d = new DepartementController();
    $departements = $d->render();
    
?>



<!DOCTYPE html>
<html>
<head>
    <title>Départements</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <h1>Liste des départements</h1>
    
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
        </tr>
        <?php if (isset($departements) && !empty($departements)): ?>
            <?php foreach ($departements as $departement): ?>            <tr>
                <td><?php echo htmlspecialchars($departement['departement_id']); ?></td>
                <td><?php echo htmlspecialchars($departement['departement_nom']); ?></td>
                <td><?php echo htmlspecialchars($departement['departement_description']); ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="no-data">Aucun département trouvé.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

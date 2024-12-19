<?php

require '../../controllers/EquipementRehabilitationController.php';
    $d = new EquipementRehabilitationController();
    $equipements = $d->render();
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Équipements de Réhabilitation</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <h1>Liste des équipements de réhabilitation</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Disponible</th>
            <th>Date de Modification</th>
            <th>Département ID</th>
        </tr>
        <?php if (isset($equipements) && !empty($equipements)):
        foreach ($equipements as $equipement): ?>
        <tr>
            <td><?php echo $equipement['equipement_id']; ?></td>
            <td><?php echo $equipement['type_equipement']; ?></td>
            <td><?php echo $equipement['disponible']; ?></td>
            <td><?php echo $equipement['date_modification']; ?></td>
            <td><?php echo $equipement['departement_id']; ?></td>
        </tr>
        <?php endforeach; else: ?>
            <tr>
                <td colspan="5" class="no-data">Aucun equipements trouvé</td>
            </tr>
            <?php endif; ?>
    </table>
</body>
</html>
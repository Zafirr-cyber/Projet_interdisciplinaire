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
    <a href="../../index.php" class="back-button">← Retour à l'accueil</a>
    <h1>Liste des équipements de réhabilitation</h1>
    <a href="create.php" class="add-button"> Ajouter un equipement</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Disponible</th>
            <th>Date de Modification</th>
            <th>Département ID</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($equipements) && !empty($equipements)):
        foreach ($equipements as $equipement): ?>
        <tr>
            <td><?php echo $equipement['equipement_id']; ?></td>
            <td><?php echo $equipement['type_equipement']; ?></td>
            <td><?php echo $equipement['disponible']; ?></td>
            <td><?php echo $equipement['date_modification']; ?></td>
            <td><?php echo $equipement['departement_id']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $equipement['equipement_id']; ?>">Modifier</a> |
                <a href="delete.php?id=<?php echo $equipement['equipement_id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet equipement ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
            <tr>
                <td colspan="5" class="no-data">Aucun equipements trouvé</td>
            </tr>
            <?php endif; ?>
    </table>
</body>
</html>
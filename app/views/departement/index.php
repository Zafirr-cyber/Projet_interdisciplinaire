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
    <a href="../../index.php" class="back-button">← Retour à l'accueil</a>
    <h1>Liste des départements</h1>
    <a href="create.php" class="add-button">+ Ajouter un Département</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($departements) && !empty($departements)): ?>
            <?php foreach ($departements as $departement): ?>            
                <tr>
                    <td><?php echo htmlspecialchars($departement['departement_id']); ?></td>
                    <td><?php echo htmlspecialchars($departement['departement_nom']); ?></td>
                    <td><?php echo htmlspecialchars($departement['departement_description']); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $departement['departement_id']; ?>">Modifier</a> |
                        <a href="delete.php?id=<?php echo $departement['departement_id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce département ?');">Supprimer</a>
                    </td>
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

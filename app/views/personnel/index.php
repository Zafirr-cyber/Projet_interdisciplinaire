<?php

require '../../controllers/PersonnelController.php';
$d = new PersonnelController();
$personnels = $d->render();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Personnel</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="../../index.php" class="back-button">← Retour à l'accueil</a>
    <h1>Liste du Personnel</h1>
    <a href="create.php" class="add-button">+ Ajouter un Personnel</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($personnels) && !empty($personnels)): ?>
            <?php foreach ($personnels as $personnel): ?>            
                <tr>
                    <td><?php echo htmlspecialchars($personnel['personnel_medical_id']); ?></td>
                    <td><?php echo htmlspecialchars($personnel['nom']); ?></td>
                    <td><?php echo htmlspecialchars($personnel['prenom']); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $personnel['personnel_medical_id']; ?>">Modifier</a> |
                        <a href="delete.php?id=<?php echo $personnel['personnel_medical_id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce personnel ?');">Supprimer</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="no-data">Aucun personnel trouvé.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

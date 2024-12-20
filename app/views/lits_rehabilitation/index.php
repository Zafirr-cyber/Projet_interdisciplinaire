<?php

require '../../controllers/LitsRehabilitationController.php';
    $lit = new LitsRehabilitationController();
    $lits = $lit->render();
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lits de Réhabilitation</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="../../index.php" class="back-button">← Retour à l'accueil</a>
    <h1>Liste des lits de réhabilitation</h1>
    <a href="create.php" class="add-button"> Ajouter un lit</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Disponible</th>
            <th>Type</th>
            <th>Date de Création</th>
            <th>Date de Modification</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($lits) && !empty($lits)):
            foreach ($lits as $lit): ?>
        <tr>
            <td><?php echo $lit['lit_id']; ?></td>
            <td><?php echo $lit['disponible']; ?></td>
            <td><?php echo $lit['type_lit']; ?></td>
            <td><?php echo $lit['date_creation']; ?></td>
            <td><?php echo $lit['date_modification']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $lit['lit_id']; ?>">Modifier</a> |
                <a href="delete.php?id=<?php echo $lit['lit_id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce lit ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan ="6" class = "no-data">Aucun lits n'a été trouvé</td>
        </tr>
            <?php endif; ?>
    </table>
</body>
</html>
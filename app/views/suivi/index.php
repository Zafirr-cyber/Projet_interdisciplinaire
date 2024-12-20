<?php

require '../../controllers/SuiviController.php';
$d = new SuiviController();
$suivis = $d->render();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Suivi</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="../../index.php" class="back-button">← Retour à l'accueil</a>
    <h1>Liste des suivis medicals</h1>
    <a href="create.php" class="add-button">+ Ajouter un Suivi</a>
    <table>
        <tr>
            <th>ID</th>
            <th>date_entree</th>
            <th>date_sortie</th>
            <th>date_mesure</th>
            <th>patient_id</th>
            <th>progression</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($suivis) && !empty($suivis)): ?>
            <?php foreach ($suivis as $suivi): ?>            
                <tr>
                    <td><?php echo htmlspecialchars($suivi['id_suivi']); ?></td>
                    <td><?php echo htmlspecialchars($suivi['date_entree']); ?></td>
                    <?php if ($suivi['date_sortie'] == NULL): ?>
                        <td>Hospitalisé</td>
                    <?php else : ?>
                    <td><?php echo htmlspecialchars($suivi['date_sortie']); 
                    endif; ?></td>
                    <td><?php echo htmlspecialchars($suivi['date_mesure']); ?></td>
                    <td><?php echo htmlspecialchars($suivi['id_patient']); ?></td>
                    <td><?php echo htmlspecialchars($suivi['progression']); ?></td>
                    <td>
                    <?php if ($suivi['date_sortie'] == NULL): ?><a href="update.php?id=<?php echo $suivi['id_suivi']; ?>">Attribuer une date de sortie</a>|<?php else:endif;?> 
                        <a href="delete.php?id=<?php echo $suivi['id_suivi']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce suivi ?');">Supprimer</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="no-data">Aucun suivi trouvé.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

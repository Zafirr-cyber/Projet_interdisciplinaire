<?php

require '../../controllers/PatientsRehabilitationController.php';
    $patient = new PatientsRehabilitationController();
    $patients = $patient->render();
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patients de Réhabilitation</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">

</head>
<body>
    <a href="../../index.php" class="back-button">← Retour à l'accueil</a>
    <h1>Liste des patients de réhabilitation</h1>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
        <?php if (isset($patients) && !empty($patients)):
             foreach ($patients as $patient): ?>
        <tr>
            <td><?php echo $patient['patient_id']; ?></td>
            <td><?php echo $patient['nom']; ?></td>
            <td><?php echo $patient['prenom']; ?></td>
        </tr>
        <?php endforeach; else: ?>
            <tr>
            <td colspan ="3" class = "no-data">Aucun patients n'a été trouvé</td>
            </tr>
            <?php endif; ?>
    </table>
</body>
</html>
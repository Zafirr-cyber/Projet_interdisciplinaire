<?php
require_once 'models/EquipementRehabilitation.php';

class EquipementRehabilitationController {
    public function index() {
        $equipement = new EquipementRehabilitation();
        $stmt = $equipement->read();
        $equipements = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/equipement_rehabilitation/index.php';
    }
}
?>
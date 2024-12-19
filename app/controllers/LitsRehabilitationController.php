<?php
require_once '../models/LitsRehabilitation.php';

class LitsRehabilitationController {
    public function index() {
        $lit = new LitsRehabilitation();
        $stmt = $lit->read();
        $lits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/lits_rehabilitation/index.php';
    }
}
?>
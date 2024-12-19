<?php
require_once '../models/PatientsRehabilitation.php';

class PatientsRehabilitationController {
    public function index() {
        $patient = new PatientsRehabilitation();
        $stmt = $patient->read();
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/patients_rehabilitation/index.php';
    }
}
?>
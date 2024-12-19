<?php
require_once '../../models/PatientsRehabilitation.php';

class PatientsRehabilitationController {
    private $patient;

    public function __construct() {
        $this->patient = new PatientsRehabilitation();  
    }

    public function render() {
        return $this->patient->read();
    }
}
?>
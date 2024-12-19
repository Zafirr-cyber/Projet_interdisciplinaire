<?php
require_once '../../models/EquipementRehabilitation.php';

class EquipementRehabilitationController {
    private $equipement;

    public function __construct() {
        $this->equipement = new EquipementRehabilitation();
    }
    public function render() {
        return $this->equipement->read();
    }
}
?>
<?php
require_once  '../../models/Departement.php';

class DepartementController {
    private $departement;

    public function __construct() {
        $this->departement = new Departement();
    }

    public function render() {
        return $this->departement->read();
    }
    
}
?>
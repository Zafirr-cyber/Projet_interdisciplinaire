<?php
require_once  '../../models/Suivi.php';

class SuiviController {
    private $suivi;

    public function __construct() {
        $this->suivi = new Suivi();
    }

    public function render() {
        return $this->suivi->read();
    }
    
}
?>
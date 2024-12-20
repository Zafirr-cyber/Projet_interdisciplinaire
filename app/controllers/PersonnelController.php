<?php
require_once '../../models/Personnel.php';

class PersonnelController {
    private $personnel;

    public function __construct() {
        $this->personnel = new Personnel();  
    }

    public function render() {
        return $this->personnel->read();
    }
}
?>
<?php
require_once '../../models/LitsRehabilitation.php';

class LitsRehabilitationController {
    private $lit;
    public function __construct() {
        $this->lit = new LitsRehabilitation();
    }
        
    public function render()  {
        return $this->lit->read();   
    }
    
}
?>
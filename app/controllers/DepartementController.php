<?php
require_once  'models/Departement.php';

class DepartementController {
    public function index() {
        $departement = new Departement();
        $stmt = $departement->read();
        $departements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($departements);

        // Debugging output
        echo '<pre>';
        var_dump($departements);
        echo '</pre>';

        // Pass the data to the view
        $this->render('departement/index', ['departements' => $departements]);
    }

    private function render($view, $data = []) {
        extract($data); 
        ob_start();
        require 'views/' . $view . '.php';
        echo ob_get_clean();
    }
    
}
?>
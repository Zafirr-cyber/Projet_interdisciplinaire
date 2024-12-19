<?php
require_once 'config/database.php';

class EquipementRehabilitation {
    private $conn;
    private $table_name = "equipement_rehabilitation";

    public $equipement_id;
    public $type_equipement;
    public $disponible;
    public $date_modification;
    public $departement_id;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
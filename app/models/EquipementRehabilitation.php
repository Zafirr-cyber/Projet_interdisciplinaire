<?php
require_once '../../../config/database.php';

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
        if ($this->conn === null) {
            throw new Exception("Database connection failed");
        }
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $test = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $test;
    }
}
?>
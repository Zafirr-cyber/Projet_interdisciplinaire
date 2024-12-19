<?php
require_once '../../config/database.php';

class PatientsRehabilitation {
    private $conn;
    private $table_name = "patients_réhabilitation";

    public $patient_id;
    public $nom;

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
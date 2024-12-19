<?php

require_once  '../../../config/database.php';

class Departement {
    private $conn;
    private $table_name = "departement";

    public $departement_id;
    public $departement_nom;
    public $department_description;

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
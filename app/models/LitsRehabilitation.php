<?php
require_once '../../../config/database.php';

class LitsRehabilitation {
    private $conn;
    private $table_name = "lits_rehabilitation";

    public $lit_id;
    public $disponible;
    public $type_lit;
    public $date_creation;
    public $date_modification;

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
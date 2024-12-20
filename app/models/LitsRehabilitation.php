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
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (type_lit, disponible, date_modification, date_creation) VALUES (:type_lit, :disponible, :date_modification, :date_creation)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type_lit', $this->type_lit);
        $stmt->bindParam(':disponible', $this->disponible);
        $stmt->bindParam(':date_modification', $this->date_modification);
        $stmt->bindParam(':date_creation', $this->date_creation);
        return $stmt->execute();
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE lit_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET type_lit = :type_lit, disponible = :disponible, date_modification = :date_modification, date_creation = :date_creation  WHERE lit_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type_lit', $this->type_lit);
        $stmt->bindParam(':disponible', $this->disponible);
        $stmt->bindParam(':date_modification', $this->date_modification);
        $stmt->bindParam(':date_creation', $this->date_creation);
        $stmt->bindParam(':id', $this->lit_id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE lit_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
<?php
require_once '../../../config/database.php';

class Personnel {
    private $conn;
    private $table_name = "personnel_medical";

    public $personeel_medical_id;
    public $nom;
    public $prenom;

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
        $query = "INSERT INTO " . $this->table_name . " (nom, prenom) VALUES (:nom, :prenom)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        return $stmt->execute();
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE personnel_medical_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nom = :nom, prenom = :prenom WHERE personnel_medical_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':id', $this->personnel_medical_id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE personnel_medical_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
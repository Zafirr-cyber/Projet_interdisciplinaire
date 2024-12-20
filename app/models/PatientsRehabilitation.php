<?php
require_once '../../../config/database.php';

class PatientsRehabilitation {
    private $conn;
    private $table_name = "patients_réhabilitation";

    public $patient_id;
    public $nom;
    public $prenom;
    public $priorite;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function read() {
        if ($this->conn === null) {
            throw new Exception("Database connection failed");
        }
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY priorite DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $test = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $test;
    }
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nom, prenom, priorite) VALUES (:nom, :prenom, :priorite)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':priorite', $this->priorite);
        return $stmt->execute();
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE patient_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nom = :nom, prenom = :prenom WHERE patient_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':id', $this->patient_id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE patient_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
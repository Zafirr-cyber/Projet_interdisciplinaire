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
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (type_equipement, disponible, date_modification, departement_id) VALUES (:type_equipement, :disponible, :date_modification, :departement_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type_equipement', $this->type_equipement);
        $stmt->bindParam(':disponible', $this->disponible);
        $stmt->bindParam(':date_modification', $this->date_modification);
        $stmt->bindParam(':departement_id', $this->departement_id);
        return $stmt->execute();
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE equipement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET type_equipement = :type_equipement, disponible = :disponible, date_modification = :date_modification, departement_id = :departement_id  WHERE equipement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type_equipement', $this->type_equipement);
        $stmt->bindParam(':disponible', $this->disponible);
        $stmt->bindParam(':date_modification', $this->date_modification);
        $stmt->bindParam(':departement_id', $this->departement_id);
        $stmt->bindParam(':id', $this->equipement_id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE equipement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}
?>
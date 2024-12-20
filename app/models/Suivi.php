<?php

require_once  '../../../config/database.php';

class Suivi {
    private $conn;
    private $table_name = "suivi_patients";

    public $id_suivi;
    public $id_patient;
    public $date_mesure;
    public $progression;
    public $date_entree;
    public $date_sortie;
    public $temp;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();

    }

    public function read() {
        if ($this->conn === null) {
            throw new Exception("Database connection failed");
        }
        $query = "SELECT * FROM " . $this->table_name ." ORDER BY progression DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $test = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $test;
    }
    public function idExists($id) {
        $sql = "SELECT 1 FROM suivi_patients WHERE id_patient = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);

    $stmt->execute(); 
    return $stmt->fetchColumn() > 0;
    }
    public function create() {
        $temp = $this->id_patient;
        if($this->idExists($temp)){
            $query = "INSERT INTO " . $this->table_name . " (date_entree, date_mesure, id_patient, progression) VALUES (:entree, :mesure, :patient, :progression)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':entree', $this->date_entree);
        $stmt->bindParam(':mesure', $this->date_mesure);
        $stmt->bindParam(':patient', $this->id_patient);
        $stmt->bindParam(':progression', $this->progression);
        return $stmt->execute();
        } else {
        print_r("Patient n'existe pas"); }
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_suivi = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET date_sortie = :sortie WHERE id_suivi = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':sortie', $this->date_sortie);
        $stmt->bindParam(':id', $this->id_suivi);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_suivi = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
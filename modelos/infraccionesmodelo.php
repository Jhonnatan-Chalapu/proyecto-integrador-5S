<?php
require_once '../bdd.php';
  
class infracciones{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM infracciones");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO infracciones (codigo_delito, detalle_delito)
             VALUES (:codigo_delito, :detalle_delito)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM infrcciones WHERE codigo_delito = :codigo_delito");
        $query->bindParam(':codigo_delito', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE infracciones SET 
                codigo_delito = :codigo_delito, 
                detalle_delito = :detalle_delito 
             WHERE codigo_delito = :codigo_delito"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM infracciones WHERE codigo_delito = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
?>
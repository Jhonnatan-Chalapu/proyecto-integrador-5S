<?php
require_once '../bdd.php';

class patios{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM patios");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO patios (codigo_patio, detalle_patio)
             VALUES (:codigo_patio, :detalle_patio)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM patios WHERE codigo_patio = :codigo_patio");
        $query->bindParam(':codigo_patio', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE patios SET 
                codigo_patio = :codigo_patio, 
                detalle_patio = :detalle_patio 
             WHERE codigo_patio = :codigo_patio"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM patios WHERE codigo_patio = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

}


?>
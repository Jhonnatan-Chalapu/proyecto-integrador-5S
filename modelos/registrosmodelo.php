<?php
require_once '../bdd.php';
  
class registro{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM registros");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO registros (codigo_registro, fecha_registro, total_registro, estado_registro)
             VALUES (:codigo_registro, :fecha_registro, :total_registro, :estado_registro)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM registros WHERE codigo_registro = :codigo_registro");
        $query->bindParam(':codigo_registro', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE registros SET 
                codigo_registro = :codigo_registro, 
                fecha_registro = :fecha_registro,
                total_registro = :total_registro,
                estado_registro = :estado_registro
             WHERE codigo_registro = :codigo_registro"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM registros WHERE id_actividad = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
?>
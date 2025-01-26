<?php
require_once '../bdd.php';
  
class modelos{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM modelos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO modeos (codigo_modelo, detalle_modelo)
             VALUES (:codigo_modelo, :detalle_modelo)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM modelos WHERE codigo_modelo = :codigo_modelo");
        $query->bindParam(':codigo_modelo', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE mode.os SET 
                codigo_modelo = :codigo_modelo, 
                detalle_modelo = :detalle_modelo 
             WHERE codigo_modelo = :codigo_modelo"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM modelos WHERE codigo_modelo = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

}

?>
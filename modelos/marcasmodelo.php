<?php
require_once '../bdd.php';
  
class marcas{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM marcas");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO marcas (codigo_marca, detalle_marca)
             VALUES (:codigo_marca, :detalle_marca)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM marcas WHERE codigo_marca = :codigo_marca");
        $query->bindParam(':codigo_marca', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE marcas SET 
                codigo_marca = :codigo_marca, 
                detalle_marca = :detalle_marca 
             WHERE codigo_marca = :codigo_marca"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM marcas WHERE codigo_marca = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

}

?>
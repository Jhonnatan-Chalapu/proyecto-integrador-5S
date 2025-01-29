<?php
require_once '../bdd.php';
  
class responsable{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM responsables");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO responsables (cedula_responsable, nombre_responsable, apellido_responsable, correo_responsable)
             VALUES (:cedula_responsable, :nombre_responsable, :apellido_responsable, :correo_responsable)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM responsables WHERE cedula_responsable = :cedula_responsable");
        $query->bindParam(':cedula_responsable', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE responsables SET 
                cedula_responsable = :cedula_responsable, 
                nombre_responsable = :nombre_responsable,
                apellido_responsable = :apellido_responsable,
                correo_responsable = :correo_responsable
             WHERE cedula_responsable = :cedula_responsable"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM responsables WHERE cedula_responsable = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

}

?>
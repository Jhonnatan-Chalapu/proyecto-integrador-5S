<?php
require_once '../bdd.php';
  
class propietario{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM propietarios");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO propietarios (cedula_propietario, nombre1_propietario, nombre2_propietario, 
            apellido1_propietario, apellido2_propietario, telefono1_propietario, telefono2_propietario,
            correo_propietario, estado_civil_propietario)
             VALUES (:cedula_propietario, :nombre1_propietario, :nombre2_propietario, :apellido1_propietario,
             :apellido2_propietario, :telefono1_propietario, :telefono2_propietario, :correo_propietario, 
             :estado_civil_propietario)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM propietarios WHERE cedula_propietario = :cedula_propietario");
        $query->bindParam(':cedula_propietario', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE patios SET 
                cedula_propietario = :cedula_propietario, 
                nombre1_propietario = :nombre1_propietario,
                nombre2_propietario = :nombre2_propietario,
                apellido1_propietario = :apellido1_propietario,
                apellido2_propietario = :apellido2_propietario,
                telefono1_propietario = :telefono1_propietario,
                telefono2_propietario = :telefono2_propietario,
                correo_propietario = :correo_propietario,
                estado_civil_propietario = :estado_civil_propietario
             WHERE codigo_patio = :codigo_patio"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM propietarios WHERE cedula_propietario = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

}
?>
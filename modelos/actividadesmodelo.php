<?php
require_once '../bdd.php';
  
class actividades{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM actividades");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO actividades (id_actividad, detalle_actividades, valor_actividad)
             VALUES (:id_actividad, :detalle_actividades, :valor_actividad)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM actividades WHERE id_actividad = :id_actividad");
        $query->bindParam(':id_actividad', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE actividades SET 
                id_actividad = :id_actividad, 
                detalle_actividades = :detalle_actividades,
                valor_actividad = :valor_actividad
             WHERE id_actividad = :id_actividad"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM actividades WHERE id_actividad = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
?>
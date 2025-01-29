<?php
require_once '../bdd.php';
  
class detalleregistro{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM detalle_registros");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO detalle_registros (id_registro, cantidad, valor_detalle_registros, 
            subtotal)
             VALUES (:id_registro, :cantidad, :valor_detalle_registros, :subtotal)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM detalle_registros WHERE id_registro = :id_registro");
        $query->bindParam(':id_registro', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE detalle_registros SET 
                id_registro = :id_registro, 
                cantidad = :cantidad,
                valor_detalle_registros = :valor_detalle_registros,
                subtotal = :subtotal
             WHERE id_registro = :id_registro"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM detalle_registros WHERE id_registro = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
?>
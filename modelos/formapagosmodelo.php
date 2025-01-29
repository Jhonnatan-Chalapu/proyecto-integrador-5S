<?php
require_once '../bdd.php';
  
class formapagos{
    private $db;
 
    public function __construct() {
        $this->db = (new Database())->conectar();
    }
 
    public function listar() {
        $query = $this->db->query("SELECT * FROM forma_pagos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function ingresar($data) {
        $query = $this->db->prepare(
            "INSERT INTO forma_pagos (id_forma_pago, detalle_forma_pago)
             VALUES (:id_forma_pago, :detalle_forma_pago)"
        );
        return $query->execute($data);
    }

    public function obtener($id) {
        $query = $this->db->prepare("SELECT * FROM forma_pagos WHERE id_forma_pago = :detalle_forma_pago");
        $query->bindParam(':id_forma_pago', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizar($data) {
        $query = $this->db->prepare(
            "UPDATE forma_pagos SET 
                id_forma_pago = :id_forma_pago, 
                detalle_forma_pago = :detalle_forma_pago 
             WHERE id_forma_pago = :id_forma_pago"
        );
        return $query->execute($data);
    }
    
    public function eliminar($id) {
        $query = $this->db->prepare("DELETE FROM forma_pagos WHERE id_forma_pago = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
?>
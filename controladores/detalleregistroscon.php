<?php
require_once '../modelos/detalleregistrosmodelo.php';

class registroscon{
    private $model;

    public function __construct() {
        $this->model = new detalleregistro();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/detalleregistros/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_registro' => $_POST['id_registro'],
                'cantidad' => $_POST['cantidad'],
                'valor_detalle_registros' => $_POST['valor_detalle_registros'],
                'subtotal' => $_POST['subtotal']
            ];
            $this->model->ingresar($data);
            header('Location: detalleregistros.php');
        } else {
            require '../vistas/detalleregistros/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_registro' => $_POST['id_registro'],
                'cantidad' => $_POST['cantidad'],
                'valor_detalle_registros' => $_POST['valor_detalle_registros'],
                'subtotal' => $_POST['subtotal']
            ];
            $this->model->actualizar($data);
            header('Location: detalleregistros.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/detalleregistros/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: detalleregistros.php');
        }
    } 
}

?>
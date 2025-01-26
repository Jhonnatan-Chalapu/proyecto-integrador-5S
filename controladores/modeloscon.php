<?php
require_once '../modelos/modelosmodelo.php';

class modeloscon{
    private $model;

    public function __construct() {
        $this->model = new marca();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/modelos/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_modelo' => $_POST['codigo_modelo'],
                'detalle_modelo' => $_POST['detalle_modelo']
            ];
            $this->model->ingresar($data);
            header('Location: modelos.php');
        } else {
            require '../vistas/modelos/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_modelo' => $_POST['codigo_modelo'],
                'detalle_modelo' => $_POST['detalle_modelo']
            ];
            $this->model->actualizar($data);
            header('Location: modelos.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/modelos/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: modelos.php');
        }
    } 
}

?>
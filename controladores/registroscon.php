<?php
require_once '../modelos/registrosmodelo.php';

class registroscon{
    private $model;

    public function __construct() {
        $this->model = new registro();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/registros/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_registro' => $_POST['codigo_registro'],
                'fecha_registro' => $_POST['fecha_registro'],
                'total_registro' => $_POST['total_registro'],
                'estado_registro' => $_POST['estado_registro']
            ];
            $this->model->ingresar($data);
            header('Location: registros.php');
        } else {
            require '../vistas/registros/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_registro' => $_POST['codigo_registro'],
                'fecha_registro' => $_POST['fecha_registro'],
                'total_registro' => $_POST['total_registro'],
                'estado_registro' => $_POST['estado_registro']
            ];
            $this->model->actualizar($data);
            header('Location: registros.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/registros/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: registros.php');
        }
    } 
}

?>
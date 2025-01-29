<?php
require_once '../modelos/vehiculosmodelo.php';

class vehiculoscon{
    private $model;

    public function __construct() {
        $this->model = new vehiculo();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/vehiculos/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'placa' => $_POST['placa'],
                'anio' => $_POST['anio'],
                'estado' => $_POST['estado']
            ];
            $this->model->ingresar($data);
            header('Location: vehiculos.php');
        } else {
            require '../vistas/vehiculos/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'placa' => $_POST['placa'],
                'anio' => $_POST['anio'],
                'estado' => $_POST['estado']
            ];
            $this->model->actualizar($data);
            header('Location: vehiculos.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/vehiculos/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: vehiculos.php');
        }
    } 
}

?>
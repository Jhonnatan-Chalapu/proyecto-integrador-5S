<?php
require_once '../modelos/patiosmodelo.php';
 
class patioscon{
    private $model;
 
    public function __construct() {
        $this->model = new patio();
    }
 
    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/patios/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_patio' => $_POST['codigo_patio'],
                'detalle_patio' => $_POST['detalle_patio']
            ];
            $this->model->ingresar($data);
            header('Location: patios.php');
        } else {
            require '../vistas/petios/registro.php';
        }
    }
 
    //---------------------------------------------------------------
 
    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_patio' => $_POST['codigo_patio'],
                'detalle_patio' => $_POST['detalle_patio']
            ];
            $this->model->actualizar($data);
            header('Location: patios.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/patios/editar.php';
        }
    }
   
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: patios.php');
        }
    }
}
 
?>
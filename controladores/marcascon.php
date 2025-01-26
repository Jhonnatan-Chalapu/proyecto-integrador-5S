<?php
require_once '../modelos/marcasmodelo.php';

class marcascon{
    private $model;

    public function __construct() {
        $this->model = new marca();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/marcas/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_marca' => $_POST['codigo_marca'],
                'detalle_marca' => $_POST['detalle_marca']
            ];
            $this->model->ingresar($data);
            header('Location: marcas.php');
        } else {
            require '../vistas/marcas/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_marca' => $_POST['codigo_marca'],
                'detalle_marca' => $_POST['detalle_marca']
            ];
            $this->model->actualizar($data);
            header('Location: marcas.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/marcas/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: marcas.php');
        }
    } 
}

?>
<?php
require_once '../modelos/infraccionesmodelo.php';

class infraccionescon{
    private $model;

    public function __construct() {
        $this->model = new infraccion();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/infracciones/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_delito' => $_POST['codigo_delito'],
                'detalle_delito' => $_POST['detalle_delito']
            ];
            $this->model->ingresar($data);
            header('Location: infracciones.php');
        } else {
            require '../vistas/infracciones/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo_delito' => $_POST['codigo_delito'],
                'detalle_delito' => $_POST['detalle_delito']
            ];
            $this->model->actualizar($data);
            header('Location: infracciones.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/infracciones/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: infracciones.php');
        }
    } 
}

?>
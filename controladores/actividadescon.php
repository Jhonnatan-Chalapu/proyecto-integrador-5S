<?php
require_once '../modelos/infraccionesmodelo.php';

class atividadescon{
    private $model;

    public function __construct() {
        $this->model = new actividades();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/actividades/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_actividad' => $_POST['id_actividad'],
                'detalle_actividades' => $_POST['detalle_actividades'],
                'valor_actividad' => $_POST['valor_actividad']
            ];
            $this->model->ingresar($data);
            header('Location: actividades.php');
        } else {
            require '../vistas/actividades/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_actividad' => $_POST['id_actividad'],
                'detalle_actividades' => $_POST['detalle_actividades'],
                'valor_actividad' => $_POST['valor_actividad']
            ];
            $this->model->actualizar($data);
            header('Location: actividades.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/actividades/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: actividades.php');
        }
    } 
}

?>
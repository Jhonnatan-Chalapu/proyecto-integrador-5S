<?php
require_once '../modelos/responsablesmodelo.php';

class responsablescon{
    private $model;

    public function __construct() {
        $this->model = new responsable();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/responsables/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'cedula_responsable' => $_POST['cedula_responsable'],
                'nombre_responsable' => $_POST['nombre_responsable'],
                'apellido_responsable' => $_POST['apellido_responsable'],
                'correo_responsable' => $_POST['correo_responsable']
            ];
            $this->model->ingresar($data);
            header('Location: responsables.php');
        } else {
            require '../vistas/responsables/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'cedula_responsable' => $_POST['cedula_responsable'],
                'nombre_responsable' => $_POST['nombre_responsable'],
                'apellido_responsable' => $_POST['apellido_responsable'],
                'correo_responsable' => $_POST['correo_responsable']
            ];
            $this->model->actualizar($data);
            header('Location: responsables.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/responsables/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: responsables.php');
        }
    } 
}

?>
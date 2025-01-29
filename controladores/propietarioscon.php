<?php
require_once '../modelos/propietariosmodelo.php';

class propietarioscon{
    private $model;

    public function __construct() {
        $this->model = new propietario();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/propietarios/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'cedula_propietario' => $_POST['cedula_propietario'],
                'nombre1_propietario' => $_POST['nombre1_propietario'],
                'nombre2_propietario' => $_POST['nombre2_propietario'],
                'apellido1_propietario' => $_POST['apellido1_propietario'],
                'apellido2_propietario' => $_POST['apellido2_propietario'],
                'telefono1_propietario' => $_POST['telefono1_propietario'],
                'telefono2_propietario' => $_POST['telefono2_propietario'],
                'correo_propietario' => $_POST['correo_propietario'],
                'nombre1_propietario' => $_POST['nombre1_propietario'],
                'estado_civil_propietario' => $_POST['estado_civil_propietario']
            ];
            $this->model->ingresar($data);
            header('Location: propietarios.php');
        } else {
            require '../vistas/propietarios/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'cedula_propietario' => $_POST['cedula_propietario'],
                'nombre1_propietario' => $_POST['nombre1_propietario'],
                'nombre2_propietario' => $_POST['nombre2_propietario'],
                'apellido1_propietario' => $_POST['apellido1_propietario'],
                'apellido2_propietario' => $_POST['apellido2_propietario'],
                'telefono1_propietario' => $_POST['telefono1_propietario'],
                'telefono2_propietario' => $_POST['telefono2_propietario'],
                'correo_propietario' => $_POST['correo_propietario'],
                'nombre1_propietario' => $_POST['nombre1_propietario'],
                'estado_civil_propietario' => $_POST['estado_civil_propietario']
            ];
            $this->model->actualizar($data);
            header('Location: propietarios.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/propietarios/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: propietarios.php');
        }
    } 
}

?>
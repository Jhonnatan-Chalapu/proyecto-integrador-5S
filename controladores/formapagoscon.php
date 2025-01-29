<?php
require_once '../modelos/infraccionesmodelo.php';

class formapagoscon{
    private $model;

    public function __construct() {
        $this->model = new formapago();
    }

    public function listar() {
        $cargos = $this->model->listar();
        require '../vistas/formapago/listado.php';
    }
 
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_forma_pago' => $_POST['id_forma_pago'],
                'detalle_forma_pago' => $_POST['detalle_forma_pago']
            ];
            $this->model->ingresar($data);
            header('Location: formapago.php');
        } else {
            require '../vistas/formapago/registro.php';
        }
    }

    //---------------------------------------------------------------

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_forma_pago' => $_POST['id_forma_pago'],
                'detalle_forma_pago' => $_POST['detalle_forma_pago']
            ];
            $this->model->actualizar($data);
            header('Location: formapago.php');
        } else {
            $id = $_GET['id'];
            $cargo = $this->model->obtener($id);
            require '../vistas/formapago/editar.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminar($id);
            header('Location: formapago.php');
        }
    } 
}

?>
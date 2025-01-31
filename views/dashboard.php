<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: /gestionpatios/login");
    exit();
}
$usuario = $_SESSION["usuario"];
?>

<?php include __DIR__ . "/layouts/header.php"; ?>
<?php include __DIR__ . "/layouts/navbar.php"; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <?php include __DIR__ . "/layouts/sidebar.php"; ?>
        </div>
        <div class="col-9">
            <div class="container mt-5">
                <h2>Bienvenido, <?php echo htmlspecialchars($usuario["nombre"]); ?>!</h2>
                <p>Has iniciado sesión correctamente.</p>

                <!-- Tarjetas de información -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-header"><i class="fas fa-car"></i> Vehículos</div>
                            <div class="card-body">
                                <h5 class="card-title">150</h5>
                                <p class="card-text">Vehículos registrados</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header"><i class="fas fa-exclamation-triangle"></i> Infracciones</div>
                            <div class="card-body">
                                <h5 class="card-title">45</h5>
                                <p class="card-text">Infracciones activas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header"><i class="fas fa-clipboard-list"></i> Registros</div>
                            <div class="card-body">
                                <h5 class="card-title">300</h5>
                                <p class="card-text">Registros en total</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/layouts/footer.php"; ?>
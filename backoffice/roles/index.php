<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error']['login'] = 'Debe iniciar sesión para acceder al sistema.';
    header('Location: ../../user/login/');
    exit();
}

$baseUrl = '/Mantenedor-Roles/';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mantenedor de Roles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/vendor/adminlte/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/style.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    <?php include_once __DIR__ . '/../components/navbar.php'; ?>
    <?php include_once __DIR__ . '/../components/aside.php'; ?>

    <main class="app-main">

        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mb-0">Mantenedor de Roles</h1>
                        <p class="text-muted">Administración de roles del sistema funerario.</p>
                    </div>

                    <div class="col-sm-6 text-end">
                        <a href="../dashboard.php" class="btn btn-secondary">
                            Volver al dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-4">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Agregar nuevo rol</h3>
                            </div>

                            <div class="card-body">
                                <form id="form-rol">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre del rol</label>

                                        <input 
                                            type="text"
                                            id="nombre"
                                            class="form-control"
                                            placeholder="Ej: Asesor Funerario"
                                            required
                                        >
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">
                                        Guardar rol
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listado de roles</h3>
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 80px;">ID</th>
                                            <th>Nombre</th>
                                            <th style="width: 120px;">Estado</th>
                                            <th style="width: 150px;">Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tabla-roles">
                                        <tr>
                                            <td colspan="4">Cargando registros...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </main>

    <?php include_once __DIR__ . '/../components/footer.php'; ?>

</div>

<script>
    const BASE_URL = "<?php echo $baseUrl; ?>";
</script>

<script src="<?php echo $baseUrl; ?>assets/js/roles.js"></script>

</body>
</html>
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
    <title>Mantenedor de Roles - Funeraria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../components/navbar.php'; ?>

<div class="container-main">

    <div class="roles-top">
        <h2>Mantenedor de Roles</h2>

        <a class="btn-volver" href="../dashboard.php">
            Volver al dashboard
        </a>
    </div>

    <div class="roles-grid">

        <div class="roles-card">
            <h3>Agregar rol</h3>

            <form id="form-rol">

                <div class="form-group">
                    <label for="nombre">Nombre del rol</label>

                    <input 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        placeholder="Ej: Supervisor"
                        required
                    >
                </div>

                <button type="submit" class="btn-guardar">
                    Guardar rol
                </button>

            </form>
        </div>

        <div class="roles-card">
            <h3>Listado de roles</h3>

            <table class="table-roles">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acción</th>
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

<?php include __DIR__ . '/../components/footer.php'; ?>

<script>
    const BASE_URL = "<?php echo $baseUrl; ?>";
</script>

<script src="<?php echo $baseUrl; ?>assets/js/roles.js"></script>

</body>
</html>
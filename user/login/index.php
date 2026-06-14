<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: ../../backoffice/');
    exit();
}

$mensajeError = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] === 'credenciales') {
        $mensajeError = 'Usuario o contraseña incorrectos.';
    }

    if ($_GET['error'] === 'campos') {
        $mensajeError = 'Debe completar todos los campos.';
    }

    if ($_GET['error'] === 'sesion') {
        $mensajeError = 'Debe iniciar sesión para acceder al sistema.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Funeraria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../assets/vendor/adminlte/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body class="login-page bg-body-secondary">

<div class="login-box">

    <div class="login-logo">
        <b>Funeraria</b> Roles
    </div>

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Ingrese sus credenciales</p>

            <?php if ($mensajeError !== ''): ?>
                <div class="alert alert-danger">
                    <?php echo $mensajeError; ?>
                </div>
            <?php endif; ?>

            <form action="../auth/" method="POST">

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input 
                        type="text" 
                        name="usuario" 
                        id="usuario" 
                        class="form-control" 
                        placeholder="Ingrese su usuario"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        placeholder="Ingrese su contraseña"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Ingresar
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>
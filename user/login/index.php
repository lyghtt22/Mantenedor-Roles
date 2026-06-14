<?php
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

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #1f2937, #111827);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
        }

        .login-header {
            background: #0d6efd;
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }

        .login-header h1 {
            margin: 0;
            font-size: 34px;
        }

        .login-header p {
            margin: 8px 0 0;
            font-size: 15px;
            opacity: 0.9;
        }

        .login-content {
            padding: 32px;
        }

        .login-content h2 {
            text-align: center;
            margin: 0;
            color: #212529;
            font-size: 24px;
        }

        .login-content .subtitle {
            text-align: center;
            color: #6c757d;
            font-size: 14px;
            margin-top: 8px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #343a40;
            font-weight: bold;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }

        .btn-login {
            width: 100%;
            background: #0d6efd;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #0b5ed7;
        }

        .alert {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .login-info {
            text-align: center;
            margin-top: 18px;
            color: #6c757d;
            font-size: 13px;
        }
    </style>
</head>

<body class="login-page">

    <div class="login-card">

        <div class="login-header">
            <h1>Funeraria</h1>
            <p>Mantenedor de Roles</p>
        </div>

        <div class="login-content">

            <h2>Iniciar sesión</h2>
            <p class="subtitle">Ingrese sus credenciales para acceder al sistema.</p>

            <?php if ($mensajeError !== ''): ?>
                <div class="alert">
                    <?php echo htmlspecialchars($mensajeError); ?>
                </div>
            <?php endif; ?>

            <form action="../auth/" method="POST">

                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input 
                        type="text" 
                        name="usuario" 
                        id="usuario" 
                        placeholder="Ingrese su usuario"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Ingrese su contraseña"
                        required
                    >
                </div>

                <button type="submit" class="btn-login">
                    Ingresar
                </button>

            </form>

            <div class="login-info">
                Usuario: <b>admin</b> | Contraseña: <b>password</b>
            </div>

        </div>

    </div>

</body>
</html>
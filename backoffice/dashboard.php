<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error']['login'] = 'Debe iniciar sesión para acceder al sistema.';
    header('Location: ../user/login/');
    exit();
}

$baseUrl = '/Mantenedor-Roles/';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Funeraria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
        }

        header {
            background: #1f2937;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 22px;
        }

        .logout {
            background: #dc3545;
            color: white;
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 6px;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .btn {
            display: inline-block;
            background: #0d6efd;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }

        .info {
            color: #6c757d;
        }
    </style>
</head>
<body>

<header>
    <h1>Sistema Funeraria</h1>
    <a class="logout" href="../user/logout/">Cerrar sesión</a>
</header>

<div class="container">
    <div class="card">
        <h2>Dashboard</h2>

        <p class="info">
            Bienvenida/o, <?php echo htmlspecialchars($_SESSION['usuario']); ?>.
        </p>

        <p>
            Este sistema corresponde al mantenedor individual de <strong>roles</strong>.
        </p>

        <a class="btn" href="roles/">
            Ir al mantenedor de roles
        </a>
    </div>
</div>

</body>
</html>
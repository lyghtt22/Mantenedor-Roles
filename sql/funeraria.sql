CREATE DATABASE IF NOT EXISTS funeraria;
USE funeraria;

CREATE TABLE IF NOT EXISTS usuarios_sistema (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    activo BOOLEAN DEFAULT 1
);

INSERT IGNORE INTO usuarios_sistema (id, usuario, password)
VALUES (
    1,
    'admin',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
);

INSERT IGNORE INTO roles (id, nombre, activo) VALUES
(1, 'Administrador', 1),
(2, 'Asesor Funerario', 1),
(3, 'Recepcionista', 1),
(4, 'Vendedor de Servicios Funerarios', 1),
(5, 'Encargado de Sucursal', 1),
(6, 'Tanatopractor', 1),
(7, 'Conductor Funerario', 1),
(8, 'Coordinador de Ceremonias', 0);
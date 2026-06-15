# Mantenedor de Roles - Funeraria

Proyecto individual desarrollado para la asignatura de desarrollo web.
El sistema corresponde a un mantenedor de la tabla **roles** de una base de datos de funeraria.

## Descripción

El proyecto permite iniciar sesión en el sistema y administrar los roles existentes en la base de datos.

El mantenedor permite:

* Listar roles registrados.
* Agregar nuevos roles.
* Cambiar el estado de un rol entre activo e inactivo.
* Proteger el acceso mediante sesión.
* Cerrar sesión correctamente.

## Tecnologías utilizadas

* PHP
* MySQL
* HTML
* CSS
* JavaScript
* Fetch API
* XAMPP
* phpMyAdmin

## Estructura del proyecto

```text
Mantenedor-Roles/
├── api/
│   └── roles/
│       ├── listar.php
│       ├── insertar.php
│       └── cambiar_estado.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── roles.js
│   └── vendor/
│       └── adminlte/
├── backoffice/
│   ├── components/
│   │   ├── navbar.php
│   │   ├── aside.php
│   │   └── footer.php
│   ├── roles/
│   │   └── index.php
│   ├── dashboard.php
│   └── index.php
├── config/
│   └── db.php
├── sql/
│   └── funeraria.sql
├── user/
│   ├── login/
│   │   └── index.php
│   ├── auth/
│   │   └── index.php
│   └── logout/
│       └── index.php
├── index.php
└── README.md
```

## Base de datos

La base de datos utilizada se llama:

```text
funeraria
```

El script SQL se encuentra en:

```text
sql/funeraria.sql
```

Tablas utilizadas para este mantenedor:

* `usuarios_sistema`
* `roles`

## Usuario de prueba

Para ingresar al sistema se puede utilizar el siguiente usuario:

```text
Usuario: admin
Contraseña: password
```

## Funcionamiento del sistema

### Login

El usuario ingresa sus credenciales desde:

```text
user/login/
```

El archivo `user/auth/index.php` valida los datos contra la tabla `usuarios_sistema`.

Si los datos son correctos, se crea una sesión y el usuario es redirigido al backoffice.

### Backoffice

El backoffice contiene un dashboard principal y el acceso al mantenedor de roles.

Ruta del dashboard:

```text
backoffice/dashboard.php
```

Ruta del mantenedor:

```text
backoffice/roles/
```

### API de roles

El sistema utiliza endpoints para trabajar con la tabla `roles`.

Endpoints:

```text
api/roles/listar.php
api/roles/insertar.php
api/roles/cambiar_estado.php
```

Funciones:

* `listar.php`: obtiene todos los roles registrados.
* `insertar.php`: agrega un nuevo rol.
* `cambiar_estado.php`: cambia el estado activo/inactivo de un rol.

## Instalación

1. Copiar la carpeta `Mantenedor-Roles` dentro de:

```text
C:\xampp\htdocs\
```

2. Iniciar Apache y MySQL desde XAMPP.

3. Crear o importar la base de datos usando el archivo:

```text
sql/funeraria.sql
```

4. Revisar la conexión en:

```text
config/db.php
```

5. Abrir el proyecto desde el navegador:

```text
http://localhost/Mantenedor-Roles/
```

## Autor
Lesly Chuquipoma

Proyecto desarrollado como mantenedor individual de roles.

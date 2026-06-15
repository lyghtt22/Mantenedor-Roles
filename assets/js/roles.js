document.addEventListener('DOMContentLoaded', () => {
    listarRoles();

    const formRol = document.getElementById('form-rol');

    if (formRol) {
        formRol.addEventListener('submit', async (event) => {
            event.preventDefault();

            const nombre = document.getElementById('nombre').value.trim();

            if (nombre === '') {
                alert('Debe ingresar el nombre del rol.');
                return;
            }

            await insertarRol(nombre);
        });
    }
});

async function listarRoles() {
    const tablaRoles = document.getElementById('tabla-roles');

    if (!tablaRoles) {
        return;
    }

    try {
        const respuesta = await fetch(BASE_URL + 'api/roles/listar.php');
        const resultado = await respuesta.json();

        tablaRoles.innerHTML = '';

        if (!resultado.success) {
            tablaRoles.innerHTML = `
                <tr>
                    <td colspan="4">No se pudieron cargar los roles.</td>
                </tr>
            `;
            return;
        }

        if (resultado.data.length === 0) {
            tablaRoles.innerHTML = `
                <tr>
                    <td colspan="4">No existen roles registrados.</td>
                </tr>
            `;
            return;
        }

        resultado.data.forEach(rol => {
            const fila = document.createElement('tr');

            const estadoTexto = rol.activo == 1 ? 'Activo' : 'Inactivo';
            const estadoClase = rol.activo == 1 ? 'estado-activo' : 'estado-inactivo';

            const botonTexto = rol.activo == 1 ? 'Desactivar' : 'Activar';
            const botonClase = rol.activo == 1 ? 'btn-warning' : 'btn-success';

            fila.innerHTML = `
                <td>${rol.id}</td>

                <td>${limpiarHTML(rol.nombre)}</td>

                <td>
                    <span class="badge-estado ${estadoClase}">
                        ${estadoTexto}
                    </span>
                </td>

                <td>
                    <button 
                        type="button" 
                        class="btn-tabla ${botonClase}"
                        onclick="cambiarEstado(${rol.id})"
                    >
                        ${botonTexto}
                    </button>
                </td>
            `;

            tablaRoles.appendChild(fila);
        });

    } catch (error) {
        console.error(error);

        tablaRoles.innerHTML = `
            <tr>
                <td colspan="4">Error al conectar con el servidor.</td>
            </tr>
        `;
    }
}

async function insertarRol(nombre) {
    try {
        const respuesta = await fetch(BASE_URL + 'api/roles/insertar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nombre: nombre
            })
        });

        const resultado = await respuesta.json();

        if (resultado.success) {
            alert(resultado.message || 'Rol agregado correctamente.');

            document.getElementById('form-rol').reset();

            listarRoles();
        } else {
            alert(resultado.message || 'No se pudo agregar el rol.');
        }

    } catch (error) {
        console.error(error);
        alert('Error al conectar con el servidor.');
    }
}

async function cambiarEstado(id) {
    try {
        const respuesta = await fetch(BASE_URL + 'api/roles/cambiar_estado.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: id
            })
        });

        const resultado = await respuesta.json();

        if (resultado.success) {
            listarRoles();
        } else {
            alert(resultado.message || 'No se pudo cambiar el estado.');
        }

    } catch (error) {
        console.error(error);
        alert('Error al conectar con el servidor.');
    }
}

function limpiarHTML(texto) {
    return String(texto)
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
}
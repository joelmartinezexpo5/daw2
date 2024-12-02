import { alumnos } from "./datos";

function crearVistaDetalles() {
    const contentDiv = document.getElementById('content');

    const container = document.createElement('div');
    container.className = 'detalles-container';

    // Crear encabezados
    const header = document.createElement('div');
    header.className = 'detalle-row detalle-header';
    ['Nombre', 'Curso', 'Teléfono', 'Email'].forEach(text => {
        const headerDiv = document.createElement('div');
        headerDiv.textContent = text;
        header.appendChild(headerDiv);
    });
    container.appendChild(header);

    // Crear filas dinámicamente para cada alumno
    alumnos.forEach(alumno => {
        const row = document.createElement('div');
        row.className = 'detalle-row';
        row.addEventListener('click', () => seleccionarElemento(row));

        const nombreDiv = document.createElement('div');
        nombreDiv.className = 'truncated';
        nombreDiv.textContent = alumno.nombre;

        const cursoDiv = document.createElement('div');
        cursoDiv.className = 'truncated';
        cursoDiv.textContent = alumno.curso;

        const telefonoDiv = document.createElement('div');
        telefonoDiv.textContent = alumno.telefono;

        const emailDiv = document.createElement('div');
        emailDiv.className = 'truncated';
        emailDiv.textContent = alumno.email;

        row.appendChild(nombreDiv);
        row.appendChild(cursoDiv);
        row.appendChild(telefonoDiv);
        row.appendChild(emailDiv);

        container.appendChild(row);
    });

    contentDiv.appendChild(container);
}

document.getElementById('btnDetalles').addEventListener('click', crearVistaDetalles);
document.getElementById('btnFichas').addEventListener('click', crearVistaFichas);

// Inicializar con la vista de detalles
crearVistaDetalles();
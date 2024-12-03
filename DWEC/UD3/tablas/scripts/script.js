import { alumnos } from "./datos.js";

// Elementos del DOM
const contenido = document.getElementById("contenido");
const btnTabla = document.getElementById("vista-tabla");
const btnFichas = document.getElementById("vista-fichas");

// Función para mostrar la vista de tabla
function mostrarTabla() {
    contenido.innerHTML = ""; // Limpia el contenido

    const table = document.createElement("div");
    table.classList.add("table");

    // Crear encabezado
    ["Nombre", "Curso", "Teléfono", "Email"].forEach((header) => {
        const cell = document.createElement("div");
        cell.classList.add("cell", "cell-header");
        cell.textContent = header;
        table.appendChild(cell);
    });

    // Crear filas
    alumnos.forEach((alumno) => {
        const row = document.createElement("div");
        row.classList.add("row");
        row.innerHTML = `
            <div class="cell">${alumno.nombre}</div>
            <div class="cell">${alumno.curso}</div>
            <div class="cell">${alumno.telefono}</div>
            <div class="cell">${alumno.email}</div>
        `;

        row.addEventListener("click", () => seleccionarFila(row));

        table.appendChild(row);
    });

    contenido.appendChild(table);
}

// Función para mostrar la vista de fichas
function mostrarFichas() {
    contenido.innerHTML = ""; // Limpia el contenido
    alumnos.forEach((alumno) => {
        const ficha = document.createElement("div");
        ficha.classList.add("ficha");
        ficha.innerHTML = `
            <h3>${alumno.nombre}</h3>
            <p><strong>DNI:</strong> ${alumno.dni}</p>
            <p><strong>Curso:</strong> ${alumno.curso}</p>
            <p><strong>Asignaturas:</strong> ${alumno.asignaturas.join(", ")}</p>
            <p><strong>Teléfono:</strong> ${alumno.telefono}</p>
            <p><strong>Email:</strong> ${alumno.email}</p>
        `;

        ficha.addEventListener("click", () => seleccionarFicha(ficha));

        contenido.appendChild(ficha);
    });
}

// Función para resaltar una fila seleccionada
function seleccionarFila(row) {
    document.querySelectorAll(".row.selected").forEach((r) => r.classList.remove("selected"));
    row.classList.add("selected");
}

// Función para resaltar una ficha seleccionada
function seleccionarFicha(ficha) {
    document.querySelectorAll(".ficha.seleccionada").forEach((f) => f.classList.remove("seleccionada"));
    ficha.classList.add("seleccionada");
}

// Eventos de los botones
btnTabla.addEventListener("click", mostrarTabla);
btnFichas.addEventListener("click", mostrarFichas);

// Mostrar vista inicial
mostrarTabla();

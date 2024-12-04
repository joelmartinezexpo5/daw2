import { alumnos } from "./datos.js";

// Elementos del DOM
const contenido = document.getElementById("contenido");
const btnTabla = document.getElementById("vista-tabla");
const btnFichas = document.getElementById("vista-fichas");

// Función para limpiar contenido
function limpiarContenido() {
    contenido.innerHTML = "";
}

// Función para mostrar la vista de tabla
function mostrarTabla() {
    limpiarContenido();

    const encabezados = ["Nombre", "Curso", "Teléfono", "Email"];
    const table = document.createElement("div");
    table.className = "table";

    // Crear encabezado
    table.innerHTML = encabezados
        .map(header => `<div class="cell cell-header">${header}</div>`)
        .join("");

    // Crear filas
    alumnos.forEach(alumno => {
        const fila = document.createElement("div");
        fila.className = "row";
        fila.innerHTML = `
            <div class="cell">${alumno.nombre}</div>
            <div class="cell">${alumno.curso}</div>
            <div class="cell">${alumno.telefono}</div>
            <div class="cell">${alumno.email}</div>
        `;
        fila.addEventListener("click", () => resaltarElemento(fila, ".row"));
        table.appendChild(fila);
    });

    contenido.appendChild(table);
}

// Función para mostrar la vista de fichas
function mostrarFichas() {
    limpiarContenido();

    alumnos.forEach(alumno => {
        const ficha = document.createElement("div");
        ficha.className = "ficha";
        ficha.innerHTML = `
            <h3>${alumno.nombre}</h3>
            <p><strong>DNI:</strong> ${alumno.dni}</p>
            <p><strong>Curso:</strong> ${alumno.curso}</p>
            <p><strong>Asignaturas:</strong> ${alumno.asignaturas.join(", ")}</p>
            <p><strong>Teléfono:</strong> ${alumno.telefono}</p>
            <p><strong>Email:</strong> ${alumno.email}</p>
        `;
        ficha.addEventListener("click", () => resaltarElemento(ficha, ".ficha"));
        contenido.appendChild(ficha);
    });
}

// Función genérica para resaltar elementos seleccionados
function resaltarElemento(elemento, selector) {
    document.querySelectorAll(`${selector}.seleccionado`).forEach(el => el.classList.remove("seleccionado"));
    elemento.classList.add("seleccionado");
}

// Eventos de los botones
btnTabla.addEventListener("click", mostrarTabla);
btnFichas.addEventListener("click", mostrarFichas);

// Mostrar vista inicial
mostrarTabla();

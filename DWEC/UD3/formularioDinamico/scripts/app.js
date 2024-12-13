import alumnos from "./datos.js";

const tablaIzquierda = document.getElementById("tabla-izquierda");
const tablaDerecha = document.getElementById("tabla-derecha");
const ciclo = document.getElementById("ciclo");
const moverIzquierda = document.getElementById("mover-izquierda");
const moverDerecha = document.getElementById("mover-derecha");
const enviar = document.getElementById("enviar");
const resultado = document.getElementById("resultado");

let alumnosIzquierda = [...alumnos];
let alumnosDerecha = [];

// Crear tablas dinámicas
function crearTabla(tabla, datos) {
    tabla.innerHTML = ''; // Vaciar tabla
    datos.forEach(alumno => {
        const fila = document.createElement('div');
        fila.className = 'fila';
        fila.textContent = `${alumno.nombre} (${alumno.ciclo})`;

        fila.addEventListener('click', () => {
            fila.classList.toggle('seleccionada'); // Marcar/desmarcar
        });

        tabla.appendChild(fila);
    });
}

// Filtrar alumnos según el ciclo seleccionado
function filtrarPorCurso(alumnosLista) {
    const cicloSeleccionado = ciclo.value;
    return alumnosLista.filter(alumno =>
        cicloSeleccionado === 'Todos' || alumno.ciclo === cicloSeleccionado
    );
}

// Mover alumnos a la derecha
moverDerecha.addEventListener('click', () => {
    const filasSeleccionadas = tablaIzquierda.getElementsByClassName('seleccionada');
    const filasArray = [...filasSeleccionadas];

    for (const fila of filasArray) {
        const textoFila = fila.textContent;

        const alumno = alumnosIzquierda.find(a => {
            const textoAlumno = `${a.nombre} (${a.ciclo})`;
            return textoAlumno === textoFila;
        });

        if (alumno) {
            alumnosIzquierda = alumnosIzquierda.filter(a => a !== alumno);
            alumnosDerecha.push(alumno);
            fila.remove(); // Eliminar visualmente
        }
    }

    crearTabla(tablaDerecha, alumnosDerecha); // Actualizar tabla derecha
});

// Mover alumnos a la izquierda
moverIzquierda.addEventListener('click', () => {
    const filasSeleccionadas = tablaDerecha.getElementsByClassName('seleccionada');
    const filasArray = [...filasSeleccionadas];

    for (const fila of filasArray) {
        const textoFila = fila.textContent;

        const alumno = alumnosDerecha.find(a => {
            const textoAlumno = `${a.nombre} (${a.ciclo})`;
            return textoAlumno === textoFila;
        });

        if (alumno) {
            alumnosDerecha = alumnosDerecha.filter(a => a !== alumno);
            alumnosIzquierda.push(alumno);
            fila.remove(); // Eliminar visualmente
        }
    }

    crearTabla(tablaIzquierda, filtrarPorCurso(alumnosIzquierda)); // Actualizar tabla izquierda
});

// Cambiar ciclo (filtro)
ciclo.addEventListener('change', () => {
    crearTabla(tablaIzquierda, filtrarPorCurso(alumnosIzquierda));
    crearTabla(tablaDerecha, filtrarPorCurso(alumnosDerecha));
});

// Inicializar tablas
crearTabla(tablaIzquierda, filtrarPorCurso(alumnosIzquierda));
crearTabla(tablaDerecha, alumnosDerecha);

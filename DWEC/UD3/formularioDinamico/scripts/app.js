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

function crearTabla(tabla, datos) {
    tabla.innerHTML = ''; // Limpia la tabla actual

    datos.forEach((alumno, index) => {
        const fila = document.createElement('div');
        fila.className = 'fila';
        fila.dataset.id = alumno.alumnoId;
        fila.style.display = 'flex';

        // Columna 1: Nombre
        const celdaNombre = document.createElement('div');
        celdaNombre.className = 'celda-nombre';
        celdaNombre.textContent = alumno.nombre;
        celdaNombre.style.flex = '1';

        // Columna 2: Ciclo
        const celdaCiclo = document.createElement('div');
        celdaCiclo.className = 'celda-ciclo';
        celdaCiclo.textContent = alumno.ciclo;
        celdaCiclo.style.flex = '1';

        // Columna 3: Acciones
        const celdaAcciones = document.createElement('div');
        celdaAcciones.style.flex = '0 0 auto';
        const botonSubir = document.createElement('button');
        const botonBajar = document.createElement('button');
        botonSubir.textContent = '▲';
        botonBajar.textContent = '▼';

        // Funciones de "Subir" y "Bajar"
        // Funcionalidad del botón "Subir"
        botonSubir.addEventListener('click', () => {
            if (index > 0) {
                // Intercambia elementos en la lista de datos
                [datos[index - 1], datos[index]] = [datos[index], datos[index - 1]];
                crearTabla(tabla, datos); // Actualiza la tabla para reflejar los cambios
            }
        });

        // Funcionalidad del botón "Bajar"
        botonBajar.addEventListener('click', () => {
            if (index < datos.length - 1) {
                // Intercambia elementos en la lista de datos
                [datos[index], datos[index + 1]] = [datos[index + 1], datos[index]];
                crearTabla(tabla, datos); // Actualiza la tabla para reflejar los cambios
            }
        });

        // Añadir botones a la celda de acciones
        celdaAcciones.appendChild(botonSubir);
        celdaAcciones.appendChild(botonBajar);

        // Manejo de selección de filas
        fila.addEventListener('click', (e) => {
            // Evitar que los botones activen la selección de fila
            if (!e.target.closest('button')) {
                fila.classList.toggle('seleccionada');
            }
        });

        // Añadir columnas a la fila
        fila.appendChild(celdaNombre);
        fila.appendChild(celdaCiclo);
        fila.appendChild(celdaAcciones);

        // Añadir la fila a la tabla
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

moverDerecha.addEventListener('click', () => {
    const filasSeleccionadas = Array.from(tablaIzquierda.getElementsByClassName('seleccionada'));

    filasSeleccionadas.forEach(fila => {
        const nombreAlumno = fila.querySelector('.celda-nombre').textContent;
        const cicloAlumno = fila.querySelector('.celda-ciclo').textContent;

        const alumno = alumnosIzquierda.find(a => a.nombre === nombreAlumno && a.ciclo === cicloAlumno);

        if (alumno) {
            // Mueve el alumno entre los arrays
            alumnosIzquierda = alumnosIzquierda.filter(a => a !== alumno);
            alumnosDerecha.push(alumno);

            // Elimina la fila visualmente
            fila.remove();
        }
    });

    // Actualiza las tablas
    crearTabla(tablaIzquierda, filtrarPorCurso(alumnosIzquierda));
    crearTabla(tablaDerecha, alumnosDerecha);
});


moverIzquierda.addEventListener('click', () => {
    const filasSeleccionadas = Array.from(tablaDerecha.getElementsByClassName('seleccionada'));

    filasSeleccionadas.forEach(fila => {
        const nombreAlumno = fila.querySelector('.celda-nombre').textContent;
        const cicloAlumno = fila.querySelector('.celda-ciclo').textContent;

        const alumno = alumnosDerecha.find(a => a.nombre === nombreAlumno && a.ciclo === cicloAlumno);

        if (alumno) {
            // Mueve el alumno entre los arrays
            alumnosDerecha = alumnosDerecha.filter(a => a !== alumno);
            alumnosIzquierda.push(alumno);

            // Elimina la fila visualmente
            fila.remove();
        }
    });

    // Actualiza las tablas
    crearTabla(tablaIzquierda, filtrarPorCurso(alumnosIzquierda));
    crearTabla(tablaDerecha, alumnosDerecha);
});

ciclo.addEventListener('change', () => {
    crearTabla(tablaIzquierda, filtrarPorCurso(alumnosIzquierda));
    crearTabla(tablaDerecha, alumnosDerecha);
});

enviar.addEventListener('click', () => {
    const filas = tablaDerecha.querySelectorAll('.fila');
    const alumnoId = [];
    const nombres = [];
    const ciclos = [];
    const orden = [];

    filas.forEach((fila, index) => {
        const id = fila.dataset.id;
        const nombre = fila.querySelector('.celda-nombre').textContent;
        const ciclo = fila.querySelector('.celda-ciclo').textContent;
        
        alumnoId.push(id);
        nombres.push(nombre);
        ciclos.push(ciclo);
        orden.push(index + 1);
    });

    const mensajeJSON = {
        alumnoId: alumnoId,
        nombre: nombres,
        ciclos: ciclos,
        orden: orden
    };
    console.log(JSON.stringify(mensajeJSON));
    document.getElementById('resultado').textContent = JSON.stringify(mensajeJSON);
});



// Inicializar tablas
crearTabla(tablaIzquierda, filtrarPorCurso(alumnosIzquierda));
crearTabla(tablaDerecha, alumnosDerecha);
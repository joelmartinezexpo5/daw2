import alumnos from "./datos.js";

const btnTabla = document.getElementById('vista-tabla');
const btnVista = document.getElementById('vista-ficha');
const contenedor = document.getElementById('contenido');

function botones(){
    
}

function mostrarTabla() {
    contenedor.innerHTML = '';

    const tabla = document.createElement('div');
    tabla.classList.add('tabla');

    const claves = Object.keys(alumnos[0]);

    // Crear encabezado
    const encabezado = document.createElement('div');
    encabezado.classList.add('fila', 'encabezado');
    claves.forEach(clave => {
        const celda = document.createElement('div');
        celda.classList.add('celda');
        celda.innerHTML = clave;
        encabezado.appendChild(celda);
    });
    tabla.appendChild(encabezado);

    // Crear filas de datos
    alumnos.forEach(alumno => {
        const fila = document.createElement('div');
        fila.classList.add('fila');

        claves.forEach(clave => {
            const celda = document.createElement('div');
            celda.classList.add('celda');
            celda.innerHTML = alumno[clave];
            fila.appendChild(celda);
        });

        tabla.appendChild(fila);
    });

    contenedor.appendChild(tabla);
}

// Evento para botón
btnTabla.addEventListener('click', mostrarTabla);


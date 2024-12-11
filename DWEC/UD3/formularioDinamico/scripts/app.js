import alumnos from "./datos.js";

const tablaIzquierda = document.getElementById("tabla-izquierda");
const tablaDerecha = document.getElementById("tabla-derecha");
const ciclo = document.getElementById("ciclo");
const moverIzquierda = document.getElementById("mover-izquierda");
const moverDerecha = document.getElementById("mover-derecha");
const enviar = document.getElementById("enviar");
const resultado = document.getElementById("resultado");


function crearTabla(tabla, datos) {
    tabla.innerHTML = '';
    datos.forEach(alumno => {
        const fila = document.createElement('div');
        fila.className = 'fila';
        fila.textContent = `${alumno.nombre} (${alumno.ciclo})`;
        
        fila.addEventListener('click', () => {
            fila.classList.toggle('seleccionada');
        });

        tabla.appendChild(fila);
    });
}

function filtrarPorCurso() {
    const cicloSeleccionado = ciclo.value; 
    return alumnos.filter(alumno => 
        (cicloSeleccionado === 'Todos' || alumno.ciclo === cicloSeleccionado)
    );
}

moverDerecha.addEventListener('click', () => {
    let seleccionados = tablaIzquierda.getElementsByClassName('seleccionada');
    let alumnosSeleccionados = [];
    for(const seleccion of seleccionados){
        console.log(seleccion.innerText);
        alumnosSeleccionados.push(seleccion.innerText);
    }
    console.log(alumnosSeleccionados);
    crearTabla(tablaDerecha, alumnosSeleccionados);
})

ciclo.addEventListener('change', () => {
    const alumnosFiltrados = filtrarPorCurso();
    crearTabla(tablaIzquierda, alumnosFiltrados);
});

crearTabla(tablaIzquierda, alumnos);

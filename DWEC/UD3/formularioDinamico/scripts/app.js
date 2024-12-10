import alumnos from "./datos.js";

const tablaIzquierda = document.getElementById("tabla-izquierda");
const tablaDerecha = document.getElementById("tabla-derecha");
const ciclo = document.getElementById("ciclo");
const moverIzquierda = document.getElementById("mover-izquierda");
const moverDerecha = document.getElementById("mover-derecha");
const enviar = document.getElementById("enviar")
const resultado = document.getElementById("resultado");

function crearTabla(tabla, datos){
    tabla.innerHTML = '';
    datos.forEach(alumnos => {
        const fila = document.createElement('div');
        fila.className = 'fila';
        fila.textContent = `${alumnos.nombre} (${alumnos.ciclo})`
        tabla.appendChild('fila')
    });
}

crearTabla(tablaIzquierda, alumnos);

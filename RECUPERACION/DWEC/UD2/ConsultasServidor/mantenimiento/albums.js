import App from "../index.js";
import * as utilidades from '../utilidades.js';

const filtro = document.getElementById('filtro');
const elementosPorPagina = document.getElementById('numElementos');
const listado = document.getElementById('listado');
const paginador = document.getElementById('paginador');

let paginaActual = 0;
let totalAlbumes = 0;
let textoFiltro = '';

window.addEventListener('load', function () {
    actualizarListado();

    filtro.addEventListener('input', function(){
        textoFiltro = filtro.value.trim().toLowerCase();
    })
})

function actualizarListado() {
    const cantidad = elementosPorPagina.value === 'todos' ? 1000 : parseInt(elementosPorPagina.value);
    const comienzo = (paginaActual - 1) * cantidad;

    App.obtenerDatos(`albums?_start=${comienzo}&_limit=${cantidad}`)
        .then(datos => {
            utilidades.cargarListadoUsers(datos);

            if (textoFiltro !== '') {
                totalAlbumes = datos.length;
            } else {
                App.obtenerDatos('albums')
                    .then(todos => {
                        totalUsuarios = todos.length;
                        cargarPaginador(totalUsuarios, cantidad);
                    });
            }

            if (textoFiltro !== '') {
                cargarPaginador(datos.length, cantidad);
            }
        });
}
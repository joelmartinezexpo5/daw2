import App from '../index.js';
import * as utilidades from '../utilidades.js';

const filtro = document.getElementById('filtro');
const elementosPorPagina = document.getElementById('numElementos');
const paginaActual = 1;
const paginador = document.getElementById('paginador');
const todos = JSON.parse(localStorage.getItem('todos'));




console.log(todos[0]);

window.addEventListener('load', () => {
    let todosFiltrados = [...todos];

    listarConPaginador(todosFiltrados, elementosPorPagina.value, paginaActual)
    // utilidades.cargarListadoTodos(todosFiltrados);

    // filtro.addEventListener('input', ()=>{
    //         todosFiltrados = todosFiltrados.filter(todo => todo.title.toLowerCase().startsWith(filtro.value.toLowerCase()));

    //         utilidades.cargarListadoTodos(todosFiltrados);
    // });

    // elementosPorPagina.addEventListener('change', ()=>{

    // });
});


function listarConPaginador(todos, elementosPorPagina, paginaActual) {
    const elementosPaginados = App.obtenerArrayPaginado(todos, elementosPorPagina, paginaActual);

    utilidades.cargarListadoTodos(elementosPaginados);
    cargarPaginador(paginaActual, todos.length, elementosPorPagina, elementosPaginados);
}

function cargarPaginador(paginaActual, elementosTotales, elementosPorPagina, todos) {
    const paginador = document.getElementById('paginador');
    paginador.innerHTML = '';

    const totalPaginas = Math.ceil(elementosTotales / elementosPorPagina);

    for (let pag = 1; pag <= totalPaginas; pag++) {
        const btn = document.createElement('button');
        btn.innerHTML = pag;
        btn.classList.add('btn-paginador');

        if (pag === paginaActual) {
            btn.classList.add('inactivo')
        } else {
            btn.classList.add('activo')

            btn.addEventListener('click', () => {
                listarConPaginador(todos, elementosPorPagina, paginaActual);
            });
        }

        paginador.appendChild(btn);
    }
}
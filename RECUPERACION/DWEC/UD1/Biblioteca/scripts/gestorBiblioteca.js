// gestorBiblioteca.js

import Libro from './Libro.js';
import Autor from './Autor.js';
import Biblioteca from './Biblioteca.js';
import datos from '../data/datos.js';

const $biblio = (function () {
    // Eventos para manejar la carga de autores, libros y bibliotecas
    const $app = document.getElementById('app');

    // Función para renderizar autores
    function generarHTMLListadoAutores() {
        const autoresHTML = datos.autores.map(autor => {
            const autorObj = new Autor(autor.autorId, autor.nombre, autor.nacionalidad, autor.biografia, autor.libros);
            return autorObj.generarHTMLPropiedades();
        }).join('');
        $app.innerHTML = `<h2>Listado de autores</h2>${autoresHTML}`;
    }

    // Función para renderizar bibliotecas
    function generarHTMLListadoBibliotecas() {
        const bibliotecasHTML = datos.bibliotecas.map(biblioteca => {
            const bibliotecaObj = new Biblioteca(biblioteca.bibliotecaId, biblioteca.nombre, biblioteca.ubicacion);
            return bibliotecaObj.generarHTMLEdicion();
        }).join('');
        $app.innerHTML = `<h2>Listado de bibliotecas</h2>${bibliotecasHTML}`;
    }

    // Función para renderizar libros
    function generarHTMLListadoLibros() {
        const librosHTML = datos.libros.map(libro => {
            const libroObj = new Libro(libro.libroId, libro.titulo, libro.ISBN, libro.autorId, libro.bibliotecaId, libro.prestamos);
            return libroObj.generarHTMLPropiedades();
        }).join('');
        $app.innerHTML = `<h2>Listado de libros</h2>${librosHTML}`;
    }

    const btnAutores = document.getElementById('listar-autores');
    const btnBibliotecas = document.getElementById('listar-bibliotecas');
    const btnLibros = document.getElementById('listar-libros');
    // Asignación de eventos
    btnAutores.addEventListener('click', generarHTMLListadoAutores);
    btnBibliotecas.addEventListener('click', generarHTMLListadoBibliotecas);
    btnLibros.addEventListener('click', generarHTMLListadoLibros);

    return {
        generarHTMLListadoAutores,
        generarHTMLListadoBibliotecas,
        generarHTMLListadoLibros
    };
})();

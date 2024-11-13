import datos from './datos.js';
import Libro from './Libro.js';
import Autor from './Autor.js';
import Biblioteca from './Biblioteca.js';

const $biblio = (() => {
    const autores = datos.autores.map(a => new Autor(a.autorId, a.nombre, a.nacionalidad, a.biografia, a.libros));
    const libros = datos.libros.map(l => new Libro(l.libroId, l.titulo, l.ISBN, l.autorId, l.bibliotecaId, l.prestamos));
    const bibliotecas = datos.bibliotecas.map(b => new Biblioteca(b.bibliotecaId, b.nombre, b.ubicacion));

    function generarHTMLListadoAutores() {
        document.querySelector("#app").innerHTML = autores.map(autor => autor.generarHTMLPropiedades()).join("");
    }

    function generarHTMLListadoLibros() {
        document.querySelector("#app").innerHTML = libros.map(libro => libro.generarHTMLPropiedades()).join("");
    }

    function generarHTMLListadoBibliotecas() {
        document.querySelector("#app").innerHTML = bibliotecas.map(biblioteca => biblioteca.generarHTMLCreacion()).join("");
    }

    function crearPrestamo(libroId) {
        const libro = libros.find((l) => l.libroId === libroId);
        if (libro) {
            libro.prestamos.push({ fechaPrestamo: new Date().toISOString().split('T')[0] });
            console.log(`Préstamo creado para el libro: ${libro.titulo}`);
        }
    }

    function devolverPrestamo(libroId) {
        const libro = libros.find((l) => l.libroId === libroId);
        if (libro && libro.prestamos.length) {
            libro.prestamos[libro.prestamos.length - 1].fechaDevolucion = new Date().toISOString().split('T')[0];
            console.log(`Libro devuelto: ${libro.titulo}`);
        }
    }

    return {
        generarHTMLListadoAutores,
        generarHTMLListadoLibros,
        generarHTMLListadoBibliotecas,
        crearPrestamo,
        devolverPrestamo
    };
})();

export default $biblio;


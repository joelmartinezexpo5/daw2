/*Clase LibroPropiedades: 
libroId, titulo, ISBN,autorId,bibliotecaId,prestamos 
(lista con la fecha de préstamo y fecha de devolución), 
estaDisponible (calculada).Métodos:
•generarHTMLCreacion():Formulario para crear un nuevo libro.
•generarHTMLPropiedades():Detalles del libro. 
Incluye opciones de menú para: editar, borrar, listar prestamos, 
crear préstamo, devolver préstamo, listar préstamos.
•generarHTMLEdicion():Formulario para editar un libro.
•generarHTMLListadoPrestamos():Listado de préstamos.NOTA:
te doy libertad para que pienses como gestionar la solicitud 
de préstamo y devolución.
*/

export default class Libro {
    constructor(libroId, titulo, ISBN, autorId, bibliotecaId, prestamos = []) {
        this.libroId = libroId;
        this.titulo = titulo;
        this.ISBN = ISBN;
        this.autorId = autorId;
        this.bibliotecaId = bibliotecaId;
        this.prestamos = prestamos;
    }

    generarHTMLPropiedades() {
        return `
            <div class="libro">
                <h2>${this.titulo}</h2>
                <p>ISBN: ${this.ISBN}</p>
                <p>ID Autor: ${this.autorId}</p>
                <button class="prestar-libro" data-libro-id="${this.libroId}">Prestar</button>
                <button class="devolver-libro" data-libro-id="${this.libroId}">Devolver</button>
            </div>
        `;
    }
}



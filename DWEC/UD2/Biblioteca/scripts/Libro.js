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

class Libro{
    constructor(libroId, titulo, ISBN, autorId, bibliotecaId, prestamos, estaDisponible){
        this.libroId = libroId;
        this.titulo = titulo;
        this.ISBN = ISBN;
        this.autorId = autorId;
        this.bibliotecaId = bibliotecaId;
        this.prestamos = prestamos;
        this.estaDisponible = estaDisponible;
    }

    
}


class Libro {
    constructor(libroId, titulo, ISBN, autorId, bibliotecaId, prestamos = []) {
        this.libroId = libroId;
        this.titulo = titulo;
        this.ISBN = ISBN;
        this.autorId = autorId;
        this.bibliotecaId = bibliotecaId;
        this.prestamos = prestamos;
    }

    generarHTMLCreacion(){
        return `
            <form id="crearLibro">
                <label>Titulo: <input type="text" id="titulo"></label>
                <label>ISBN: <input type="text" id="ISBN"></label>
                <label>Autor: <input type="number" id="autor"></label>
                <label>Biblioteca: <input type="number" id="Biblioteca"></label>
            <button type="submit">Crear Libro</button>
        `
    }

    generarHTMLPropiedades(){
        return `
            <div class="libro">
                <h2>${this.titulo}</h2>
                <p>ISBN: ${this.ISBN}</p>
                <p>Autor: ${this.autorId}</p>
                <p>Biblioteca: ${this.bibliotecaId}</p>
                <button class="prestar-libro">Prestar Libro</button>
                <button class="devolver-libro">Devolver Libro</button>
            </div>
        `
    }

    generarHTMLEdicion(){
        return `
            <form id="editarLibro">
                <label>Título: <input type="text" id="titulo" value="${this.titulo}"></label>
                <label>ISBN: <input type="text" id="isbn" value="${this.ISBN}"></label>
                <button type="submit">Guardar Cambios</button>
            </form>
        `;
    }

    generarHTMLPrestamos(){
        if (this.prestamos.length === 0) {
            return `<p>Este libro no tiene préstamos registrados.</p>`;
        }

        return `
            <div class="prestamos">
                <h3>Préstamos para ${this.titulo}</h3>
                <ul>
                    ${this.prestamos.map(p => `
                        <li>Fecha Préstamo: ${p.fechaPrestamo}, Fecha Devolución: ${p.fechaDevolucion || "No devuelto"}</li>
                    `).join("")}
                </ul>
            </div>
        `;
    }
}
export default Libro;

export default Autor;

class Autor {
    constructor(autorId, nombre, nacionalidad, biografia, libros = []) {
        this.autorId = autorId;
        this.nombre = nombre;
        this.nacionalidad = nacionalidad;
        this.biografia = biografia;
        this.libros = libros;
    }

    generarHTMLCreacion() {
        return `
            <form id="crearAutor">
                <label>Nombre: <input type="text" id="nombre"></label>
                <label>Nacionalidad: <input type="text" id="nacionalidad"></label>
                <label>Biografía: <textarea id="biografia"></textarea></label>
                <button type="submit">Crear Autor</button>
            </form>
        `;
    }

    generarHTMLPropiedades() {
        return `
            <div class="autor">
                <h2>${this.nombre}</h2>
                <p>Nacionalidad: ${this.nacionalidad}</p>
                <p>Biografía: ${this.biografia}</p>
                <h3>Libros Publicados</h3>
                <ul>
                    ${this.libros.map(libro => `<li>${libro}</li>`).join('')}
                </ul>
                <button class="agregar-libro" data-autor-id="${this.autorId}">Añadir Libro</button>
            </div>
        `;
    }

    generarHTMLEdicion() {
        return `
            <form id="editarAutor">
                <label>Nombre: <input type="text" id="nombre" value="${this.nombre}"></label>
                <label>Nacionalidad: <input type="text" id="nacionalidad" value="${this.nacionalidad}"></label>
                <label>Biografía: <textarea id="biografia">${this.biografia}</textarea></label>
                <button type="submit">Guardar Cambios</button>
            </form>
        `;
    }
}
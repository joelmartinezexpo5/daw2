export default class Autor {
    constructor(autorId, nombre, nacionalidad, biografia, libros = []) {
        this.autorId = autorId;
        this.nombre = nombre;
        this.nacionalidad = nacionalidad;
        this.biografia = biografia;
        this.libros = libros;
    }

    generarHTMLPropiedades() {
        return `
            <div class="autor">
                <h2>${this.nombre}</h2>
                <p>Nacionalidad: ${this.nacionalidad}</p>
                <p>Biografía: ${this.biografia}</p>
                <p>Libros publicados: ${this.libros.join(", ")}</p>
            </div>
        `;
    }
}


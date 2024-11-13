export default class Biblioteca {
    constructor(bibliotecaId, nombre, ubicacion) {
        this.bibliotecaId = bibliotecaId;
        this.nombre = nombre;
        this.ubicacion = ubicacion;
    }

    generarHTMLCreacion() {
        return `
            <div class="biblioteca">
                <h2>${this.nombre}</h2>
                <p>Ubicación: ${this.ubicacion}</p>
            </div>
        `;
    }
}


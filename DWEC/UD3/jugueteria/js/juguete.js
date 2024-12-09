export default class Juguete {
    #jugueteId;
    constructor(jugueteId, nombre = '', marca = '', precio = 0.0) {
        this.#jugueteId = jugueteId;
        this.nombre = nombre;
        this.marca = marca;
        this.precio = precio;
    }

    get jugueteId() {
        return this.#jugueteId;
    }

    generarHTMLPropiedades() {
        return `
            <form data-componente="propiedades">
                <input type="hidden" name="jugueteid" value="${this.jugueteId}">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="${this.nombre}" required>
                </div>
                <div>
                    <label for="marca">Marca:</label>
                    <input type="text" name="marca" value="${this.marca}" required>
                </div>
                <div>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" value="${this.precio}" step="0.01" required>
                </div>
                <div>
                    <button type="submit">Guardar</button>
                </div>
            </form>
        `;
    }
}

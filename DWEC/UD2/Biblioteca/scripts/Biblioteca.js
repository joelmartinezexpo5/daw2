class Biblioteca{
    constructor(bibliotecaId, nombre, ubicacion){
        this.bibliotecaId = bibliotecaId;
        this.nombre = nombre;
        this.ubicacion = ubicacion
    }

    generarHTMLCreacion(){
        return `
            <form id="crearBiblioteca">
                <label>Nombre: <input type="text" id="nombre"></label>
                <label>Ubicación: <input type="text" id="ubicacion"></label>
                <button type="submit">Crear Biblioteca</button>
            </form>
        `;
    }

    generarHTMLPropiedades(){
        return `
            <div class="biblioteca">
                <h2>${this.nombre}</h2>
                <p>Ubicación: ${this.ubicacion}</p>
            </div>
        `;
    }

    generarHTMLEdicion(){
        return `
            <form id="editarBiblioteca">
                <label>Nombre: <input type="text" id="nombre" value="${this.nombre}"></label>
                <label>Ubicación: <input type="text" id="ubicacion" value="${this.ubicacion}"></label>
                <button type="submit">Guardar Cambios</button>
            </form>
        `;
    }
    
}
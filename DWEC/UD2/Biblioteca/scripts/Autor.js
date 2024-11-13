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
            <div class="crearAutor">
                <form>
                    <label for="id">ID:</label>
                    <input type="text" id="id" name="id">
                    <br><br>
                    <label for="nombreAutor">Nombre:</label>
                    <input type="text" id="nombreAutor" name="nombreAutor">
                    <br><br>
                    <label for="nacionalidad">Nacionalidad:</label>
                    <input type="text" id="nacionalidad" name="nacionalidad">
                    <br><br>
                    <label for="biografia">Biografia:</label>
                    <input type="text" id="biografia" name="biografia">
                    <br><br>
                    <label for="libros">Libros:</label>
                    <input type="text" id="libros" name="libros">
                    <br><br>
                    <button type="button">Crear Autor</button>
                </form>
            </div>
        `
    }

    generarHTMLPropiedades() {
        return `
            
        `
    }

    generarHTMLEdicion() { }
}
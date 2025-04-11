// biblioteca.js

export default class Biblioteca {
    constructor(bibliotecaId, nombre, ubicacion) {
      this.bibliotecaId = bibliotecaId;
      this.nombre = nombre;
      this.ubicacion = ubicacion;
    }
  
    generarHTMLCreacion() {
      return `
        <h2>Crear nueva biblioteca</h2>
        <form>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre"><br><br>
          <label for="ubicacion">Ubicación:</label>
          <input type="text" id="ubicacion" name="ubicacion"><br><br>
          <button type="submit">Crear</button>
        </form>
      `;
    }
  
    generarHTMLEdicion() {
      return `
        <h2>Editar biblioteca</h2>
        <form>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" value="${this.nombre}" name="nombre"><br><br>
          <label for="ubicacion">Ubicación:</label>
          <input type="text" id="ubicacion" value="${this.ubicacion}" name="ubicacion"><br><br>
          <button type="submit">Editar</button>
        </form>
      `;
    }
  }
  
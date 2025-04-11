// autor.js

export default class Autor {
    constructor(autorId, nombre, nacionalidad, biografia, libros) {
      this.autorId = autorId;
      this.nombre = nombre;
      this.nacionalidad = nacionalidad;
      this.biografia = biografia;
      this.libros = libros;
    }
  
    generarHTMLCreacion() {
      return `
        <h2>Crear nuevo autor</h2>
        <form>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre"><br><br>
          <label for="nacionalidad">Nacionalidad:</label>
          <input type="text" id="nacionalidad" name="nacionalidad"><br><br>
          <label for="biografia">Biografía:</label>
          <textarea id="biografia" name="biografia"></textarea><br><br>
          <button type="submit">Crear</button>
        </form>
      `;
    }
  
    generarHTMLPropiedades() {
      return `
        <h3>${this.nombre}</h3>
        <p>Nacionalidad: ${this.nacionalidad}</p>
        <p>Biografía: ${this.biografia}</p>
        <ul>
          ${this.libros.map(libro => `<li>${libro}</li>`).join('')}
        </ul>
        <button class="biblio-autor-editar" data-id="${this.autorId}">Editar</button>
        <button class="biblio-autor-borrar" data-id="${this.autorId}">Borrar</button>
      `;
    }
  }
  
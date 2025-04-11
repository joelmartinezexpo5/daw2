// libro.js

export default class Libro {
    constructor(libroId, titulo, ISBN, autorId, bibliotecaId, prestamos) {
      this.libroId = libroId;
      this.titulo = titulo;
      this.ISBN = ISBN;
      this.autorId = autorId;
      this.bibliotecaId = bibliotecaId;
      this.prestamos = prestamos;
    }
  
    get estaDisponible() {
      return this.prestamos.every(prestamo => prestamo.fechaDevolucion != null);
    }
  
    generarHTMLCreacion() {
      return `
        <h2>Crear nuevo libro</h2>
        <form>
          <label for="titulo">Título:</label>
          <input type="text" id="titulo" name="titulo"><br><br>
          <label for="ISBN">ISBN:</label>
          <input type="text" id="ISBN" name="ISBN"><br><br>
          <label for="autorId">Autor:</label>
          <input type="text" id="autorId" name="autorId"><br><br>
          <label for="bibliotecaId">Biblioteca:</label>
          <input type="text" id="bibliotecaId" name="bibliotecaId"><br><br>
          <button type="submit">Crear</button>
        </form>
      `;
    }
  
    generarHTMLPropiedades() {
      return `
        <h3>${this.titulo}</h3>
        <p>ISBN: ${this.ISBN}</p>
        <p>Disponible: ${this.estaDisponible ? 'Sí' : 'No'}</p>
        <button class="biblio-libro-editar" data-id="${this.libroId}">Editar</button>
        <button class="biblio-libro-borrar" data-id="${this.libroId}">Borrar</button>
      `;
    }
  }
  
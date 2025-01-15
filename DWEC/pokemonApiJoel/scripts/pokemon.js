// pokemon.js

export class Pokemon {
    constructor(nombre, sprite, url) {
      this.nombre = nombre;
      this.sprite = sprite;
      this.url = url;
    }
  
    static async crearDesdeAPI(datos) {
      const { name, url } = datos;
      const detalles = await fetch(url).then(res => res.json());
      return new Pokemon(name, detalles.sprites.front_default, url);
    }
  }
  
  export class Equipo {
    constructor(nombre = '') {
      this.nombre = nombre;
      this.pokemon = [];
    }
  
    agregarPokemon(pokemon) {
      if (this.pokemon.length < 6) {
        this.pokemon.push(pokemon);
      }
    }
  
    esValido() {
      return this.pokemon.length === 6;
    }
  }
  
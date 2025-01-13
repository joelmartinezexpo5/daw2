// Variables globales
const cuadros = document.querySelectorAll('.cuadro');
const pokedex = document.getElementById('pokedex');
const listaPokemon = document.getElementById('listaPokemon');
const cerrarpokedexBtn = document.getElementById('cerrarpokedex');
let cuadroSeleccionado = null;

// Función para cargar y mostrar los Pokémon en el pokedex
async function cargarListaPokemon() {
  const respuesta = await fetch('https://pokeapi.co/api/v2/pokemon?limit=20');
  const datos = await respuesta.json();

  listaPokemon.innerHTML = ''; // Limpiar la lista de Pokémon

  for (const pokemon of datos.results) {
    const respuestaPokemon = await fetch(pokemon.url);
    const detalles = await respuestaPokemon.json();

    // Crear tarjeta de Pokémon
    const tarjeta = document.createElement('div');
    tarjeta.classList.add('tarjeta-pokemon');
    tarjeta.innerHTML = `
      <img src="${detalles.sprites.front_default}" alt="${detalles.name}">
      <h4>${detalles.name}</h4>
    `;

    // Agregar evento para seleccionar este Pokémon
    tarjeta.addEventListener('click', () => seleccionarPokemon(detalles));

    listaPokemon.appendChild(tarjeta);
  }
}

// Mostrar el pokedex para seleccionar un Pokémon
function mostrarpokedex(index) {
  cuadroSeleccionado = index;
  cargarListaPokemon();
  pokedex.classList.remove('hidden');
}

// Cerrar el pokedex
function cerrarpokedex() {
  pokedex.classList.add('hidden');
}

// Seleccionar un Pokémon y actualizar el cuadro
function seleccionarPokemon(pokemon) {
  const cuadro = cuadros[cuadroSeleccionado];
  cuadro.innerHTML = `
    <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}">
    <span>${pokemon.name}</span>
  `;
  cerrarpokedex();
}

// Agregar eventos a los cuadros
cuadros.forEach((cuadro, index) => {
  cuadro.addEventListener('click', () => mostrarpokedex(index));
});

// Evento del botón para cerrar el pokedex
cerrarpokedexBtn.addEventListener('click', cerrarpokedex);

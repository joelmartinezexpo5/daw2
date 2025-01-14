// Selección de elementos del DOM
const cuadros = document.querySelectorAll('.cuadro'); // Cuadros donde se mostrará el Pokémon seleccionado.
const ventanaEmergente = document.getElementById('ventanaEmergente'); // Ventana emergente para mostrar la lista de Pokémon.
const listaPokemon = document.getElementById('listaPokemon'); // Contenedor para las tarjetas de Pokémon.
const cerrarVentanaEmergenteBtn = document.getElementById('cerrarVentanaEmergente'); // Botón para cerrar la ventana emergente.
const paginadorAnterior = document.getElementById('anterior'); // Botón para retroceder en la paginación.
const paginadorSiguiente = document.getElementById('siguiente'); // Botón para avanzar en la paginación.
const filtroGeneracion = document.getElementById('filtro-generacion'); // Selector para filtrar Pokémon por generación.
const generarAleatorioBtn = document.getElementById('generarAleatorio'); // Botón para generar un equipo aleatorio.
const limpiarEquipoBtn = document.getElementById('limpiarEquipo'); // Botón para limpiar el equipo actual.
let equipoActual = []; // Array para almacenar los Pokémon seleccionados en el equipo.
let cuadroSeleccionado = null; // Índice del cuadro actualmente seleccionado para un Pokémon.
let paginaActual = 1; // Página actual para la paginación de los Pokémon.
const limitePorPagina = 20; // Número de Pokémon que se muestran por página.

// Función para cargar los Pokémon desde la API
async function cargarPokemon(pagina) {
  const desplazamiento = (pagina - 1) * limitePorPagina; // Calcula el desplazamiento para la página actual.
  const generacion = filtroGeneracion.value; // Obtiene el valor de la generación seleccionada.

  let datos = [];
  let todosPokemon = [];

  if (generacion) {
    // Si se seleccionó una generación, se obtiene la lista de Pokémon de esa generación.
    const respuesta = await fetch(`https://pokeapi.co/api/v2/generation/${generacion}`);
    const datosGeneracion = await respuesta.json();
    todosPokemon = datosGeneracion.pokemon_species;
    datos = todosPokemon.slice(desplazamiento, desplazamiento + limitePorPagina); // Aplica paginación a los Pokémon de la generación.
  } else {
    // Si no hay generación seleccionada, se obtiene la lista general de Pokémon.
    const respuesta = await fetch(`https://pokeapi.co/api/v2/pokemon?offset=${desplazamiento}&limit=${limitePorPagina}`);
    datos = (await respuesta.json()).results;
  }

  listaPokemon.innerHTML = ''; // Limpia la lista de Pokémon mostrada.

  // Crea y muestra las tarjetas de los Pokémon
  for (const pokemon of datos) {
    const urlPokemon = generacion ? pokemon.url.replace('-species', '') : pokemon.url;
    const respuestaPokemon = await fetch(urlPokemon);
    const detalles = await respuestaPokemon.json();

    const tarjeta = document.createElement('div');
    tarjeta.classList.add('tarjeta-pokemon');
    tarjeta.innerHTML = `
      <img src="${detalles.sprites.front_default}" alt="${detalles.name}">
      <h4>${detalles.name}</h4>
    `;
    tarjeta.onclick = () => seleccionarPokemon(detalles); // Asigna la función de selección del Pokémon.
    listaPokemon.appendChild(tarjeta);
  }

  // Control de botones de paginación
  paginadorAnterior.disabled = pagina === 1; // Deshabilita el botón de retroceso si estamos en la primera página.
  paginadorSiguiente.disabled = generacion
    ? desplazamiento + limitePorPagina >= todosPokemon.length // Deshabilita el botón de avance si no hay más Pokémon.
    : datos.length < limitePorPagina; // Deshabilita si la paginación no tiene más elementos.
}

// Función para seleccionar un Pokémon y asignarlo al cuadro correspondiente
function seleccionarPokemon(pokemon) {
  const cuadro = cuadros[cuadroSeleccionado]; // Obtiene el cuadro seleccionado.
  cuadro.innerHTML = `
    <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}">
    <span>${pokemon.name}</span>
  `;
  equipoActual[cuadroSeleccionado] = pokemon; // Guarda el Pokémon en el equipo.
  ventanaEmergente.classList.add('hidden'); // Cierra la ventana emergente.
}

// Función para mostrar la ventana emergente con la lista de Pokémon
function mostrarVentanaEmergente(index) {
  cuadroSeleccionado = index; // Asigna el cuadro que se va a editar.
  paginaActual = 1; // Reinicia la paginación a la primera página.
  cargarPokemon(paginaActual); // Carga la primera página de Pokémon.
  ventanaEmergente.classList.remove('hidden'); // Muestra la ventana emergente.
}

// Funciones de paginación
paginadorAnterior.addEventListener('click', () => cargarPokemon(--paginaActual)); // Retroceder una página.
paginadorSiguiente.addEventListener('click', () => cargarPokemon(++paginaActual)); // Avanzar una página.

// Función para generar un equipo aleatorio de 6 Pokémon
async function generarEquipoAleatorio() {
  const respuesta = await fetch(`https://pokeapi.co/api/v2/pokemon?limit=898`);
  const datos = (await respuesta.json()).results.sort(() => 0.5 - Math.random()).slice(0, 6);

  datos.forEach((pokemon, index) => {
    fetch(pokemon.url).then(res => res.json()).then(detalles => {
      cuadros[index].innerHTML = `
        <img src="${detalles.sprites.front_default}" alt="${detalles.name}">
        <span>${detalles.name}</span>
      `;
    });
  });
}

// Función para limpiar el equipo actual
function limpiarEquipo() {
  cuadros.forEach(c => (c.innerHTML = 'Seleccionar')); // Limpia todos los cuadros.
  equipoActual = []; // Vacía el array del equipo.
}

// Función para guardar el equipo en el localStorage
function guardarEquipo() {
  const nombreEquipo = document.getElementById('nombreEquipo').value.trim();

  if (!nombreEquipo) {
    alert('Por favor, asigna un nombre al equipo antes de guardarlo.');
    return;
  }

  if (equipoActual.length < 6) {
    alert('Tu equipo debe tener 6 Pokémon antes de guardarlo.');
    return;
  }

  const equiposGuardados = JSON.parse(localStorage.getItem('equiposPokemon')) || [];

  const nuevoEquipo = {
    nombre: nombreEquipo,
    pokemons: equipoActual,
  };

  equiposGuardados.push(nuevoEquipo); // Añade el nuevo equipo a los equipos guardados.

  localStorage.setItem('equiposPokemon', JSON.stringify(equiposGuardados)); // Guarda los equipos en localStorage.

  alert(`Equipo "${nombreEquipo}" guardado con éxito.`);
  limpiarEquipo(); // Limpia el equipo actual.

  mostrarEquiposGuardados(); // Actualiza la lista de equipos guardados.
}

// Función para mostrar los equipos guardados
function mostrarEquiposGuardados() {
  const listaEquipos = document.getElementById('listaEquipos');
  listaEquipos.innerHTML = ''; // Limpia la lista de equipos.

  const equiposGuardados = JSON.parse(localStorage.getItem('equiposPokemon')) || [];

  if (equiposGuardados.length === 0) {
    listaEquipos.innerHTML = '<p>No tienes equipos guardados.</p>';
    return;
  }

  equiposGuardados.forEach((equipo, index) => {
    const item = document.createElement('li');
    item.innerHTML = `
      <h4>${equipo.nombre}</h4>
      <div>
        ${equipo.pokemons.map(pokemon => `
          <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}" title="${pokemon.name}">
        `).join('')}
      </div>
      <button onclick="editarEquipo(${index})">Editar</button>
      <button onclick="eliminarEquipo(${index})">Eliminar</button>
    `;
    listaEquipos.appendChild(item); // Añade el equipo a la lista.
  });
}

// Función para editar un equipo existente
function editarEquipo(index) {
  const equiposGuardados = JSON.parse(localStorage.getItem('equiposPokemon')) || [];
  const equipo = equiposGuardados[index];

  document.getElementById('nombreEquipo').value = equipo.nombre; // Rellena el nombre del equipo en el formulario.

  equipo.pokemons.forEach((pokemon, i) => {
    cuadros[i].innerHTML = `
      <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}">
      <span>${pokemon.name}</span>
    `;
  });

  equipoActual = equipo.pokemons.slice(); // Copia el array de Pokémon para poder modificarlo.

  document.getElementById('guardarEquipo').textContent = 'Guardar cambios'; // Cambia el texto del botón.

  document.getElementById('guardarEquipo').onclick = () => guardarCambiosEquipo(index); // Modifica el evento para guardar los cambios.
}

// Función para guardar los cambios al editar un equipo
function guardarCambiosEquipo(index) {
  const nombreEquipo = document.getElementById('nombreEquipo').value.trim();

  if (!nombreEquipo) {
    alert('Por favor, asigna un nombre al equipo antes de guardarlo.');
    return;
  }

  if (equipoActual.length < 6) {
    alert('Tu equipo debe tener 6 Pokémon antes de guardarlo.');
    return;
  }

  const equiposGuardados = JSON.parse(localStorage.getItem('equiposPokemon')) || [];
  
  equiposGuardados[index] = {
    nombre: nombreEquipo,
    pokemons: equipoActual,
  };

  localStorage.setItem('equiposPokemon', JSON.stringify(equiposGuardados)); // Guarda el equipo editado en localStorage.

  alert(`Equipo "${nombreEquipo}" actualizado con éxito.`);
  limpiarEquipo(); // Limpia el equipo actual.

  mostrarEquiposGuardados(); // Muestra la lista actualizada de equipos.

  document.getElementById('guardarEquipo').textContent = 'Guardar Equipo'; // Resetea el texto del botón.

  document.getElementById('guardarEquipo').onclick = guardarEquipo; // Resetea el evento del botón.
}

// Función para eliminar un equipo
function eliminarEquipo(index) {
  const equiposGuardados = JSON.parse(localStorage.getItem('equiposPokemon')) || [];

  equiposGuardados.splice(index, 1); // Elimina el equipo del array.

  localStorage.setItem('equiposPokemon', JSON.stringify(equiposGuardados)); // Guarda los equipos actualizados en localStorage.

  mostrarEquiposGuardados(); // Muestra la lista actualizada de equipos.
}

// Asignación de eventos
cuadros.forEach((cuadro, index) => cuadro.addEventListener('click', () => mostrarVentanaEmergente(index))); // Abre la ventana emergente para seleccionar un Pokémon.
cerrarVentanaEmergenteBtn.addEventListener('click', () => ventanaEmergente.classList.add('hidden')); // Cierra la ventana emergente.
generarAleatorioBtn.addEventListener('click', generarEquipoAleatorio); // Genera un equipo aleatorio.
limpiarEquipoBtn.addEventListener('click', limpiarEquipo); // Limpia el equipo.
document.getElementById('guardarEquipo').addEventListener('click', guardarEquipo); // Guarda el equipo.
document.addEventListener('DOMContentLoaded', mostrarEquiposGuardados); // Muestra los equipos guardados cuando se carga la página.

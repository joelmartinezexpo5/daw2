import { obtenerLibros, crearLibro, actualizarLibro, eliminarLibro } from './api.js';

const form = document.getElementById('form-libro');
const tablaLibros = document.getElementById('tabla-libros');
const inputId = document.getElementById('libro-id');
const inputTitulo = document.getElementById('titulo');
const inputAutor = document.getElementById('autor');
const inputPublicacion = document.getElementById('publicacion');
const inputPrecio = document.getElementById('precio');
const selectTipo = document.getElementById('tipo');
const btnCancelar = document.getElementById('btn-cancelar');

function limpiarFormulario() {
  inputId.value = '';
  inputTitulo.value = '';
  inputAutor.value = '';
  inputPublicacion.value = '';
  inputPrecio.value = '';
  selectTipo.value = '';
}

function crearFila(libro) {
  const fila = document.createElement('div');
  fila.classList.add('fila');

  fila.innerHTML = `
    <div>${libro.id}</div>
    <div>${libro.titulo}</div>
    <div>${libro.autor}</div>
    <div>${libro.publicacion}</div>
    <div>${libro.precio.toFixed(2)}€</div>
    <div>${libro.tipo}</div>
    <div>
      <button class="editar">Editar</button>
      <button class="eliminar">Eliminar</button>
    </div>
  `;

  // Editar
  fila.querySelector('.editar').addEventListener('click', () => {
    inputId.value = libro.id;
    inputTitulo.value = libro.titulo;
    inputAutor.value = libro.autor;
    inputPublicacion.value = libro.publicacion;
    inputPrecio.value = libro.precio;
    selectTipo.value = libro.tipo;
  });

  // Eliminar
  fila.querySelector('.eliminar').addEventListener('click', async () => {
    if (confirm(`¿Eliminar libro "${libro.titulo}"?`)) {
      try {
        await eliminarLibro(libro.id);
        cargarLibros();
        limpiarFormulario();
      } catch {
        alert('Error al eliminar el libro');
      }
    }
  });

  return fila;
}

async function cargarLibros() {
  try {
    const libros = await obtenerLibros();
    tablaLibros.innerHTML = '';

    // Cabecera
    const cabecera = document.createElement('div');
    cabecera.classList.add('fila', 'cabecera');
    cabecera.innerHTML = `
      <div>ID</div>
      <div>Título</div>
      <div>Autor</div>
      <div>Publicación</div>
      <div>Precio</div>
      <div>Tipo</div>
      <div>Acciones</div>
    `;
    tablaLibros.appendChild(cabecera);

    libros.forEach(libro => {
      tablaLibros.appendChild(crearFila(libro));
    });
  } catch {
    alert('Error al cargar los libros');
  }
}

form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const libro = {
    id: inputId.value ? parseInt(inputId.value) : 0, // ID 0 para nuevo libro
    titulo: inputTitulo.value.trim(),
    autor: inputAutor.value.trim(),
    publicacion: inputPublicacion.value,
    precio: parseFloat(inputPrecio.value),
    tipo: selectTipo.value,
  };

  try {
    if (inputId.value) {
      await actualizarLibro(libro.id, libro);
      alert('Libro actualizado');
    } else {
      await crearLibro(libro);
      alert('Libro creado');
    }
    limpiarFormulario();
    cargarLibros();
  } catch (error) {
    alert(error.message || 'Error al guardar el libro');
  }
});

btnCancelar.addEventListener('click', () => {
  limpiarFormulario();
});

cargarLibros();

const baseUrl = 'http://localhost:8000';

export async function obtenerLibros() {
    try {
        const response = await fetch(`${baseUrl}/libros`);
        if (!response.ok) {
            throw new Error('Error al obtener los libros');
        }
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

export async function obtenerLibro(id) {
    try {
        const response = await fetch(`${baseUrl}/libros/${id}`);
        if (!response.ok) {
            throw new Error('Libro no encontrado');
        }
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

export async function eliminarLibro(id) {
    try {
        const response = await fetch(`${baseUrl}/libros/eliminar/${id}`, {
            method: 'POST'
        });
        
        if (!response.ok) {
            throw new Error('Error al eliminar el libro');
        }
        return true;
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

const tablaLibros = document.getElementById('tabla-libros');
const inputId = document.getElementById('libro-id');
const inputTitulo = document.getElementById('titulo');
const inputAutor = document.getElementById('autor');
const inputPublicacion = document.getElementById('publicacion');
const inputPrecio = document.getElementById('precio');
const selectTipo = document.getElementById('tipo');

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
      <button class="editar">Ver</button>
      <button class="eliminar">Eliminar</button>
    </div>
  `;

  // Editar
  fila.querySelector('.editar').addEventListener('click', () => {
    const parametro = new URLSearchParams();

    parametro.append('id', libro.id);

    const nuevaUrl = `http://127.0.0.1:5500/formulario.html?${parametro.toString()}`;
    console.log(nuevaUrl)

    window.location.href = nuevaUrl;
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

cargarLibros();

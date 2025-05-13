import Aplicacion from '../../app.js';
import { mostrarError, crearElemento } from '../../utils.js';

document.addEventListener('DOMContentLoaded', async () => {
  const entidad = 'users';
  let paginaActual = 1;
  let porPagina = Aplicacion.obtenerPreferencia(entidad) || 10;
  let filtro = '';
  let datos = [];

  // Elementos del DOM
  const selectPorPagina = document.getElementById('por-pagina');
  const inputFiltro = document.getElementById('filtro');
  const tbody = document.querySelector('#tabla-usuarios tbody');
  const btnAnterior = document.getElementById('anterior');
  const btnSiguiente = document.getElementById('siguiente');
  const infoPagina = document.getElementById('info-pagina');

  // Configurar valor inicial
  selectPorPagina.value = porPagina;

  // Cargar y mostrar datos
  const cargarYMostrarDatos = async () => {
    try {
      datos = await Aplicacion.cargarDatosPaginados(entidad, paginaActual, porPagina, filtro);
      mostrarDatos(datos);
      infoPagina.textContent = `Página ${paginaActual}`;
    } catch (error) {
      mostrarError('Error al cargar los usuarios. Intente nuevamente.');
    }
  };

  // Mostrar datos en la tabla
  const mostrarDatos = (datos) => {
    tbody.innerHTML = '';
    datos.forEach(usuario => {
      const fila = crearElemento('tr');
      fila.innerHTML = `
        <td>${usuario.id}</td>
        <td>${usuario.name}</td>
        <td>${usuario.email}</td>
        <td>
          <button data-user-id="${usuario.id}" data-accion="todos">Ver pendientes</button>
          <button data-user-id="${usuario.id}" data-accion="albums">Ver álbumes</button>
          <button data-user-id="${usuario.id}" data-accion="posts">Ver posts</button>
        </td>
      `;
      tbody.appendChild(fila);
    });
  };

  // Event listeners
  selectPorPagina.addEventListener('change', (e) => {
    porPagina = parseInt(e.target.value);
    Aplicacion.guardarPreferencia(entidad, porPagina);
    paginaActual = 1;
    cargarYMostrarDatos();
  });

  inputFiltro.addEventListener('input', (e) => {
    filtro = e.target.value;
    paginaActual = 1;
    cargarYMostrarDatos();
  });

  btnAnterior.addEventListener('click', () => {
    if (paginaActual > 1) {
      paginaActual--;
      cargarYMostrarDatos();
    }
  });

  btnSiguiente.addEventListener('click', () => {
    if (datos.length === porPagina) {
      paginaActual++;
      cargarYMostrarDatos();
    }
  });

  // Delegación de eventos para botones de acciones
  document.addEventListener('click', (e) => {
    if (e.target.tagName === 'BUTTON' && e.target.dataset.accion) {
      const userId = e.target.dataset.userId;
      const accion = e.target.dataset.accion;
      window.location.href = `${accion}.html?userId=${userId}`;
    }
  });

  // Carga inicial
  await cargarYMostrarDatos();
});
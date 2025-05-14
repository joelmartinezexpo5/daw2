import Aplicacion from '../app.js';
import { 
  mostrarError, 
  ocultarError, 
  crearElemento,
  obtenerParametroURL,
  guardarFiltroActual,
  obtenerFiltroAnterior
} from '../utils.js';

document.addEventListener('DOMContentLoaded', async () => {
  const entidad = 'users';
  let paginaActual = 1;
  let porPagina = Aplicacion.obtenerPreferencia(entidad) || 10;
  let filtro = '';
  let datos = [];
  let totalRegistros = 0;

  // Elementos del DOM
  const selectPorPagina = document.getElementById('por-pagina');
  const inputFiltro = document.getElementById('filtro');
  const tbody = document.querySelector('#tabla-usuarios tbody');
  const btnAnterior = document.getElementById('anterior');
  const btnSiguiente = document.getElementById('siguiente');
  const infoPagina = document.getElementById('info-pagina');
  const contenedorErrores = document.getElementById('contenedor-errores');

  // Configurar valor inicial
  selectPorPagina.value = porPagina;

  // Cargar y mostrar datos
  const cargarYMostrarDatos = async () => {
    ocultarError();
    try {
      const { datos: datosApi, total } = await Aplicacion.cargarDatosPaginados(
        entidad, 
        paginaActual, 
        porPagina, 
        filtro
      );
      
      datos = datosApi;
      totalRegistros = total;
      mostrarDatos(datos);
      actualizarPaginacion();
      
      // Guardar filtro actual en sessionStorage
      guardarFiltroActual(entidad, { filtro, paginaActual, porPagina });
    } catch (error) {
      mostrarError('Error al cargar los usuarios. Intente nuevamente.');
      console.error('Error:', error);
    }
  };

  // Mostrar datos en la tabla
  const mostrarDatos = (datos) => {
    tbody.innerHTML = '';
    
    if (datos.length === 0) {
      const fila = crearElemento('tr');
      fila.innerHTML = `<td colspan="5" style="text-align: center;">No se encontraron usuarios</td>`;
      tbody.appendChild(fila);
      return;
    }
    
    datos.forEach(usuario => {
      const fila = crearElemento('tr');
      fila.innerHTML = `
        <td>${usuario.id}</td>
        <td>${usuario.name}</td>
        <td>${usuario.email}</td>
        <td>${usuario.phone}</td>
        <td class="acciones">
          <button data-user-id="${usuario.id}" data-accion="todos" title="Ver tareas">✅</button>
          <button data-user-id="${usuario.id}" data-accion="albums" title="Ver álbumes">📚</button>
          <button data-user-id="${usuario.id}" data-accion="posts" title="Ver publicaciones">📝</button>
        </td>
      `;
      tbody.appendChild(fila);
    });
  };

  // Actualizar controles de paginación
  const actualizarPaginacion = () => {
    infoPagina.textContent = `Página ${paginaActual}`;
    btnAnterior.disabled = paginaActual <= 1;
    btnSiguiente.disabled = datos.length < porPagina || porPagina === 0;
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

  // Cargar filtro anterior si existe
  const cargarFiltroAnterior = () => {
    const filtroAnterior = obtenerFiltroAnterior(entidad);
    if (filtroAnterior) {
      filtro = filtroAnterior.filtro || '';
      paginaActual = filtroAnterior.paginaActual || 1;
      porPagina = filtroAnterior.porPagina || 10;
      
      inputFiltro.value = filtro;
      selectPorPagina.value = porPagina;
    }
  };

  // Carga inicial
  cargarFiltroAnterior();
  await cargarYMostrarDatos();
});
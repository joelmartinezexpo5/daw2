export const mostrarError = (mensaje, idElemento = 'contenedor-errores') => {
  const contenedor = document.getElementById(idElemento);
  if (contenedor) {
    contenedor.innerHTML = `<div class="error">${mensaje}</div>`;
    contenedor.style.display = 'block';
  }
};

export const ocultarError = (idElemento = 'contenedor-errores') => {
  const contenedor = document.getElementById(idElemento);
  if (contenedor) {
    contenedor.style.display = 'none';
  }
};

export const crearElemento = (etiqueta, atributos = {}, texto = '') => {
  const elemento = document.createElement(etiqueta);
  for (const [clave, valor] of Object.entries(atributos)) {
    elemento.setAttribute(clave, valor);
  }
  if (texto) elemento.textContent = texto;
  return elemento;
};

export const irAPaginaEntidad = (entidad) => {
  const paginas = {
    'users': 'usuarios',
    'todos': 'tareas',
    'posts': 'publicaciones',
    'comments': 'comentarios',
    'albums': 'albumes',
    'photos': 'fotos'
  };
  window.location.href = `${paginas[entidad] || entidad}.html`;
};

export const obtenerParametroURL = (nombre) => {
  const parametros = new URLSearchParams(window.location.search);
  return parametros.get(nombre);
};

export const guardarFiltroActual = (entidad, filtro) => {
  sessionStorage.setItem(`filtro_${entidad}`, JSON.stringify(filtro));
};

export const obtenerFiltroAnterior = (entidad) => {
  return JSON.parse(sessionStorage.getItem(`filtro_${entidad}`)) || null;
};

export const formatearFecha = (fechaString) => {
  const opciones = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(fechaString).toLocaleDateString('es-ES', opciones);
};
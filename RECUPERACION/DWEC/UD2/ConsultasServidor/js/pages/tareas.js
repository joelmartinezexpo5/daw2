import Aplicacion from './app.js';
import { mostrarError, crearElemento } from './utils.js';

document.addEventListener('DOMContentLoaded', async () => {
  const entidad = 'todos';
  let paginaActual = 1;
  let porPagina = Aplicacion.obtenerPreferencia(entidad) || 10;
  let filtro = '';
  let datos = [];

  // Configuración inicial similar a usuarios.js
  // Adaptar para mostrar: id, userId, title, completed
});
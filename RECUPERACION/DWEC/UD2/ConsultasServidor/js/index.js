import Aplicacion from './app.js';
import { mostrarError, crearElemento, irAPaginaEntidad } from './utils.js';

document.addEventListener('DOMContentLoaded', async () => {
  try {
    const conteos = await Aplicacion.obtenerConteosEntidades();
    const contenedor = document.getElementById('contenedor-tarjetas');
    
    // Mapeo de entidades API a tus archivos HTML
    const mapeoEntidades = {
      'users': 'usuarios',
      'todos': 'tareas',
      'posts': 'publicaciones',
      'comments': 'comentarios',
      'albums': 'albumes',
      'photos': 'fotos'
    };
    
    for (const [entidad, conteo] of Object.entries(conteos)) {
      const tarjeta = crearElemento('div', { class: 'tarjeta', 'data-entidad': mapeoEntidades[entidad] || entidad });
      tarjeta.innerHTML = `
        <h3>${entidad}</h3>
        <p>Total: ${conteo}</p>
      `;
      tarjeta.addEventListener('click', () => irAPaginaEntidad(mapeoEntidades[entidad] || entidad));
      contenedor.appendChild(tarjeta);
    }
  } catch (error) {
    mostrarError('Error al cargar los datos. Intente nuevamente más tarde.');
  }
});
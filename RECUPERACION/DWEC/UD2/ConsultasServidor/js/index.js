import Aplicacion from './app.js';
import { mostrarError, crearElemento, irAPaginaEntidad } from './utils.js';

document.addEventListener('DOMContentLoaded', async () => {
  try {
    const conteos = await Aplicacion.obtenerConteosEntidades();
    const contenedor = document.getElementById('contenedor-tarjetas');
    
    if (!contenedor) return;
    
    const entidadesTraducidas = {
      'users': 'Usuarios',
      'todos': 'Tareas',
      'posts': 'Publicaciones',
      'comments': 'Comentarios',
      'albums': 'Álbumes',
      'photos': 'Fotos'
    };
    
    const iconosEntidades = {
      'users': '👤',
      'todos': '✅',
      'posts': '📝',
      'comments': '💬',
      'albums': '📚',
      'photos': '📷'
    };
    
    for (const [entidad, conteo] of Object.entries(conteos)) {
      const tarjeta = crearElemento('div', { 
        class: 'tarjeta', 
        'data-entidad': entidad 
      });
      
      tarjeta.innerHTML = `
        <div style="font-size: 2rem;">${iconosEntidades[entidad] || '📁'}</div>
        <h3>${entidadesTraducidas[entidad] || entidad}</h3>
        <p>Total: ${conteo}</p>
      `;
      
      tarjeta.addEventListener('click', () => irAPaginaEntidad(entidad));
      contenedor.appendChild(tarjeta);
    }
  } catch (error) {
    mostrarError('Error al cargar los datos. Intente nuevamente más tarde.');
    console.error('Error:', error);
  }
});
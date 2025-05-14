import Aplicacion from './app.js';
import { mostrarError, crearElemento } from './utils.js';

document.addEventListener('DOMContentLoaded', async () => {
  const entidad = 'albums';
  // Configuración similar
  
  // Botón "Ver fotos" para cada álbum
  document.addEventListener('click', (e) => {
    if (e.target.dataset.accion === 'fotos') {
      const albumId = e.target.dataset.albumId;
      window.location.href = `fotos.html?albumId=${albumId}`;
    }
  });
});
import Aplicacion from './app.js';
import { mostrarError, crearElemento } from './utils.js';

document.addEventListener('DOMContentLoaded', async () => {
  const entidad = 'posts';
  // Configuración similar
  
  // Botón "Ver comentarios" para cada publicación
  document.addEventListener('click', (e) => {
    if (e.target.dataset.accion === 'comentarios') {
      const postId = e.target.dataset.postId;
      window.location.href = `comentarios.html?postId=${postId}`;
    }
  });
});
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
  // Cambiar según tu estructura
  if (entidad === 'users') {
    window.location.href = 'usuarios.html';
  } else {
    window.location.href = `${entidad}.html`;
  }
};
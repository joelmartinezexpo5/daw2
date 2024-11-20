import { BD } from './BD.js';

export class GestionMecanica {
  #bd = new BD();
  #contenedor;

  iniciarApp(selector) {
    this.#contenedor = document.querySelector(selector);
    if (!this.#contenedor) {
      console.error('No se encontró el contenedor');
      return;
    }
    this.#renderizarHTMLBase();
    this.#asignarEventos();
  }

  #renderizarHTMLBase() {
    const html = `
      <nav>
        <button id="inicio">Inicio</button>
        <button id="listadoVehiculos">Listado Vehículos</button>
        <button id="listadoNoTerminadas">Reparaciones No Terminadas</button>
      </nav>
      <div id="contenido"></div>
    `;
    this.#contenedor.innerHTML = html;
  }

  #asignarEventos() {
    document.getElementById('inicio').addEventListener('click', () => {
      this.#mostrarInicio();
    });

    document.getElementById('listadoVehiculos').addEventListener('click', () => {
      this.#mostrarListadoVehiculos();
    });

    document.getElementById('listadoNoTerminadas').addEventListener('click', () => {
      this.#mostrarNoTerminadas();
    });
  }

  #mostrarInicio() {
    const html = `
      <h1>Bienvenido al Taller Mecánico</h1>
      <p>Usa el menú para navegar.</p>
    `;
    document.getElementById('contenido').innerHTML = html;
  }

  #mostrarListadoVehiculos() {
    const vehiculos = this.#bd.obtenerVehiculos();
    const html = vehiculos.map(v => `
      <div>
        <h2>${v.marca} ${v.modelo}</h2>
        <p>Matricula: ${v.matricula}</p>
        <p>Propietario: ${v.propietario.nombre}</p>
      </div>
    `).join('');
    document.getElementById('contenido').innerHTML = html;
  }

  #mostrarNoTerminadas() {
    const reparaciones = this.#bd.obtenerReparaciones('terminado', false);
    const html = reparaciones.map(r => `
      <div>
        <h2>Reparación: ${r.descripcion}</h2>
        <p>Vehículo ID: ${r.vehiculoId}</p>
        <p>Fecha: ${r.fecha}</p>
      </div>
    `).join('');
    document.getElementById('contenido').innerHTML = html;
  }
}

// Inicializa la aplicación
const gestion = new GestionMecanica();
gestion.iniciarApp('#app');

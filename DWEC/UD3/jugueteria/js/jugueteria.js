import datos from './datos.js';
import Juguete from './juguete.js';

class Jugueteria {
    #contenedor;
    #juguetes = [];
    #contador = 0;

    constructor() {
        this.#juguetes = datos.map(d => new Juguete(d.jugueteId, d.nombre, d.marca, d.precio));
        this.#contador = this.#juguetes.length;
    }

    iniciarApp(selector) {
        const contenedor = document.querySelector(selector);
        if (!contenedor) {
            alert("Contenedor no encontrado");
            return;
        }
        this.#contenedor = contenedor;
        this.#navegarInicio();
    }

    #navegarInicio() {
        this.#contenedor.innerHTML = `
            ${this.#generarHTMLNavegacion()}
            ${this.#generarHTMLBuscador()}
            ${this.#generarHTMLListado(this.#juguetes)}
        `;
        this.#asignarEventos();
    }

    #navegarListadoJuguetes() {
        this.#contenedor.innerHTML = `
            ${this.#generarHTMLNavegacion()}
            ${this.#generarHTMLListado(this.#juguetes)}
        `;
        this.#asignarEventos();
    }

    #generarHTMLNavegacion() {
        return `
            <nav class="jg-navegacion">
                <ul>
                    <li><a href="#" data-destino="inicio">Inicio</a></li>
                    <li><a href="#" data-destino="listado">Listado</a></li>
                </ul>
            </nav>
        `;
    }

    #generarHTMLBuscador() {
        return `
            <form data-componente="buscador">
                <input type="text" id="jg-buscador-filtro" placeholder="Buscar por nombre...">
                <button type="submit">Buscar</button>
            </form>
        `;
    }

    #generarHTMLListado(listaJuguetes) {
        return `
            <div data-componente="listado" class="jg-tabla">
                <div class="jg-tabla-fila jg-cabecera">
                    <div>Nombre</div><div>Marca</div><div>Precio</div><div>Acciones</div>
                </div>
                ${listaJuguetes.map(j => `
                    <div class="jg-tabla-fila">
                        <div>${j.nombre}</div>
                        <div>${j.marca}</div>
                        <div>${j.precio}</div>
                        <div>
                            <button data-accion="ver" data-id="${j.jugueteId}">Ver</button>
                            <button data-accion="borrar" data-id="${j.jugueteId}">Borrar</button>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;
    }

    #asignarEventos() {
        this.#contenedor.querySelectorAll('[data-destino]').forEach(el => {
            el.addEventListener('click', e => {
                e.preventDefault();
                const destino = el.getAttribute('data-destino');
                if (destino === 'inicio') this.#navegarInicio();
                if (destino === 'listado') this.#navegarListadoJuguetes();
            });
        });

        const buscador = this.#contenedor.querySelector('[data-componente="buscador"]');
        buscador?.addEventListener('submit', e => {
            e.preventDefault();
            const filtro = buscador.querySelector('#jg-buscador-filtro').value.toLowerCase();
            const juguetesFiltrados = this.#juguetes.filter(j => j.nombre.toLowerCase().includes(filtro));
            this.#contenedor.querySelector('[data-componente="listado"]').innerHTML = this.#generarHTMLListado(juguetesFiltrados);
        });

        this.#contenedor.querySelectorAll('[data-accion="ver"]').forEach(el => {
            el.addEventListener('click', () => {
                const jugueteId = parseInt(el.getAttribute('data-id'));
                const juguete = this.#juguetes.find(j => j.jugueteId === jugueteId);
                this.#navegarPropiedades(juguete);
            });
        });

        this.#contenedor.querySelectorAll('[data-accion="borrar"]').forEach(el => {
            el.addEventListener('click', () => {
                const jugueteId = parseInt(el.getAttribute('data-id'));
                this.#juguetes = this.#juguetes.filter(j => j.jugueteId !== jugueteId);
                this.#navegarListadoJuguetes();
            });
        });
    }

    #navegarPropiedades(juguete) {
        this.#contenedor.innerHTML = `
            ${this.#generarHTMLNavegacion()}
            ${juguete.generarHTMLPropiedades()}
        `;
        const formulario = this.#contenedor.querySelector('[data-componente="propiedades"]');
        formulario.addEventListener('submit', e => {
            e.preventDefault();
            juguete.nombre = formulario.nombre.value;
            juguete.marca = formulario.marca.value;
            juguete.precio = parseFloat(formulario.precio.value);
            this.#navegarListadoJuguetes();
        });
    }
}

// Inicializar la aplicación al cargar el script
const jugueteria = new Jugueteria();
jugueteria.iniciarApp('#app');

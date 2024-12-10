import tareas from './datos.js';
import Tareas from './Tareas.js';

class ListaTareas{
    #contenedor;
    #listadoTareas = [];

    constructor(){
        this.#listadoTareas=tareas.map(t => new Tareas(t.tareaId, t.titulo,t.prioridad,t.fechaRegistro,t.fechaLimite,t.descripcion,t.responsable,t.completada));
    }

    iniciarApp(selector){
        const contenedor = document.querySelector(selector);
        if(!contenedor){
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
            ${this.#generarHTMLListado(this.#listadoTareas)}
        `;
        this.#asignarEventos();
    }

    #navegarListadoTareas() {
        this.#contenedor.innerHTML = `
            ${this.#generarHTMLNavegacion()}
            ${this.#generarHTMLListado(this.#listadoTareas)}
        `;
        this.#asignarEventos();
    }

    #generarHTMLListado(listaTareas) {
        return `
            <div data-componente="listado" class="t-tabla">
                <div class="t-tabla-fila t-cabecera">
                    <div>Titulo</div><div>Prioridad</div><div>Fecha Limite</div><div>Acciones</div>
                </div>
                ${listaTareas.map(t => `
                    <div class="t-tabla-fila">
                        <div>${t.titulo}</div>
                        <div>${t.prioridad}</div>
                        <div>${t.fechaLimite}</div>
                        <div>
                            <button data-accion="ver" data-id="${t.tareaId}">Ver</button>
                            <button data-accion="borrar" data-id="${t.tareaId}">Borrar</button>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;
    }

    #generarHTMLNavegacion() {
        return `
            <nav class="t-navegacion">
                <ul>
                    <li><a href="#" data-destino="inicio">Inicio</a></li>
                    <li><a href="#" data-destino="listado">Listado</a></li>
                </ul>
            </nav>
        `;
    }

    #generarHTMLBuscador(){
        return `
            <form data-componente="buscador">
                <input type="text" id="t-buscador-filtro" placeholder="Buscar por nombre">
                <button type="submit">Buscar</button>
            </form>
        `;
    }

    #asignarEventos() {
        this.#contenedor.querySelectorAll('[data-destino]').forEach(el => {
            el.addEventListener('click', e => {
                e.preventDefault();
                const destino = el.getAttribute('data-destino');
                if (destino === 'inicio') this.#navegarInicio();
                if (destino === 'listado') this.#navegarListadoTareas();
            });
        });

        const buscador = this.#contenedor.querySelector('[data-componente="buscador"]');
        buscador?.addEventListener('submit', e => {
            e.preventDefault();
            const filtro = buscador.querySelector('#t-buscador-filtro').value.toLowerCase();
            const tareasFiltrados = this.#listadoTareas.filter(t => t.titulo.toLowerCase().includes(filtro));
            this.#contenedor.querySelector('[data-componente="listado"]').innerHTML = this.#generarHTMLListado(tareasFiltrados);
        });

        this.#contenedor.querySelectorAll('[data-accion="ver"]').forEach(el => {
            el.addEventListener('click', () => {
                const tareaId = parseInt(el.getAttribute('data-id'));
                const tarea = this.#listadoTareas.find(t => t.tareaId === tareaId);
                this.#navegarPropiedades(tarea);
            });
        });

        this.#contenedor.querySelectorAll('[data-accion="borrar"]').forEach(el => {
            el.addEventListener('click', () => {
                const tareaId = parseInt(el.getAttribute('data-id'));
                this.#listadoTareas = this.#listadoTareas.filter(t => t.tareaId !== tareaId);
                this.#navegarListadoTareas();
            });
        });
    }

    #navegarPropiedades(tarea) {
        this.#contenedor.innerHTML = `
            ${tarea.generarHTMLPropiedades()}
        `;
        const formulario = this.#contenedor.querySelector('[data-componente="propiedades"]');
        formulario.addEventListener('submit', e => {
            e.preventDefault();
            tarea.titulo = formulario.titulo.value;
            tarea.prioridad = formulario.prioridad.value;
            tarea.fechaLimite = Date(formulario.fechaLimite.value);
            this.#navegarListadoTareas();
        });
    }
}

// Inicializar la aplicación al cargar el script
const listaTareas = new ListaTareas();
listaTareas.iniciarApp('#app');

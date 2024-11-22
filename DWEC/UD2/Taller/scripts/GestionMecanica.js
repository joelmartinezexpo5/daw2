import BD from './BD.js';

class GestionMecanica {
    #clienteBD;
    #contenedor;

    constructor() {
        this.#clienteBD = new BD();
    }

    iniciarApp(selector) {
        this.#contenedor = document.querySelector(selector);
        if (!this.#contenedor) {
            console.error('No se pudo encontrar el contenedor especificado.');
            return;
        }

        this.#contenedor.innerHTML = this.#generaHTMLBase();

        this.#asignarEventos();
    }

    #generaHTMLBase() {
        return `
            <header>
                <h1>Taller Mecánico</h1>
                <nav>
                    <button id="inicio-btn">Inicio</button>
                    <button id="vehiculos-btn">Listado Vehículos</button>
                    <button id="no-terminadas-btn">Reparaciones No Terminadas</button>
                    <button id="no-pagadas-btn">Reparaciones No Pagadas</button>
                    <button id="presupuestos-btn">Presupuestos</button>
                </nav>
            </header>
            <main id="resultados">
                ${this.#generarHTMLInicio()} <!-- Pantalla de inicio por defecto -->
            </main>
        `;
    }

    #generarHTMLInicio() {
        return `
            <section>
                <h2>Buscar Vehículo</h2>
                <form id="buscar-form">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" id="matricula" name="matricula" placeholder="Ej: 1234ABC">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" placeholder="Ej: 600123456">
                    <button id="buscar-btn" type="submit">Buscar</button>
                </form>
                <div id="resultados-busqueda"></div>
            </section>
        `;
    }

    #asignarEventos() {
        document.querySelector('#inicio-btn').addEventListener('click', () => {
            this.#mostrarInicio();
        });

        document.querySelector('#vehiculos-btn').addEventListener('click', () => {
            this.#mostrarVehiculos();
        });

        document.querySelector('#buscar-btn').addEventListener('click', () => {
            this.#asignarEventoBusqueda();
        });

    }

    #mostrarInicio() {
        document.querySelector('#resultados').innerHTML = this.#generarHTMLInicio();
        this.#asignarEventoBusqueda();
    }

    #mostrarVehiculos() {
        const vehiculos = this.#clienteBD.obtenerVehiculos();
        document.querySelector('#resultados').innerHTML = this.#generarHTMLVehiculos(vehiculos);
    }

    #generarHTMLVehiculos(vehiculos) {
        return `
            <section>
                <h2>Listado de Vehículos</h2>
                <ul>
                    ${vehiculos
                .map(vehiculo => `
                        <li>
                            ${vehiculo.marca} ${vehiculo.modelo} (${vehiculo.matricula})
                            <button data-id="${vehiculo.vehiculoId}" class="ver-vehiculo-btn">Ver</button>
                        </li>
                    `
                )
                .join('')}
                </ul>
            </section>
        `;
    }

    #asignarEventoBusqueda() {
        const form = document.querySelector('#buscar-form');
        form.addEventListener('submit', event => {
            event.preventDefault();
            const matricula = form.matricula.value.trim();
            const telefono = form.telefono.value.trim();
            let resultados = [];

            if (matricula && telefono) {
                const vehiculosPorMatricula = this.#clienteBD.obtenerVehiculo('matricula', matricula);
                const vehiculosPorTelefono = this.#clienteBD.obtenerVehiculo('telefono', telefono);
                if(vehiculosPorMatricula.vehiculoId != vehiculosPorTelefono.vehiculoId){
                    resultados.push(...vehiculosPorMatricula);
                    resultados.push(...vehiculosPorTelefono);
                }else{
                    resultados.push(...vehiculosPorMatricula);
                }
                console.log(vehiculosPorMatricula);
                console.log(vehiculosPorTelefono);
            }
            // else if (matricula) {
            //     resultados.push(...this.#clienteBD.obtenerVehiculo('matricula', matricula));
            // }else if (telefono) {
            //     resultados.push(...this.#clienteBD.obtenerVehiculo('telefono', telefono));
            // }
        
        console.log('Resultados encontrados:', resultados);
        this.#mostrarResultadosBusqueda(resultados);
    });
}

#mostrarResultadosBusqueda(vehiculos) {
    const contenedorResultados = document.querySelector('#resultados-busqueda');
    if (vehiculos.length === 0) {
        contenedorResultados.innerHTML = '<p>No se encontraron vehículos.</p>';
        return;
    }

    contenedorResultados.innerHTML = `
            <ul>
                ${vehiculos
            .map(
                vehiculo => `
                    <li>${vehiculo.marca} ${vehiculo.modelo} (${vehiculo.matricula})</li>
                    <ul>
                        <li>Año: ${vehiculo.año}</li>
                        <li>Motor: ${vehiculo.motor}</li>
                        <li>Propietario: ${vehiculo.propietario.nombre}</li>
                        <li>Telefono: ${vehiculo.propietario.telefono}</li>
                        <li>Email: ${vehiculo.propietario.email}</li>
                    </ul>
                `)
            .join('')}
            </ul>
        `;
}
}

const gestion = new GestionMecanica();
gestion.iniciarApp('#app-container');

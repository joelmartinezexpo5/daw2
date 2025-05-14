import * as utilidades from './utilidades.js';

const App = (function () {
    // Una funcion async siempre devuelve una promesa
    async function obtenerDatos(endpoint) {
        try {
            const peticion = await fetch(`https://jsonplaceholder.typicode.com/${endpoint}`);

            if (!peticion.ok) throw new Error(`Error HTTP: ${peticion.status}`);

            return await peticion.json();
        } catch (error) {
            console.error("Error en la solicitud:", error.message);
        }
    }

    async function actualizarDatos(endpoint, datos) {
        try {
            const peticion = await fetch(`https://jsonplaceholder.typicode.com/${endpoint}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(datos),
            });

            return await peticion.json();
        } catch (error) {
            console.error("Error en la solicitud:", error.message);
        }
    }


    function obtenerArrayPaginado(array, elementosPorPagina, paginaActual) {
        const comienzo = (paginaActual - 1) * elementosPorPagina;
        const final = comienzo + elementosPorPagina;

        // Devuelvo una copia de una porcion del array con los valores indicados en el rango
        return array.slice(comienzo, final);
    }

    return {
        obtenerDatos,
        actualizarDatos,
        obtenerArrayPaginado,
    };
})();

window.addEventListener('load', async () => {
    const entidades = ['users', 'todos', 'posts', 'comments', 'albums', 'photos'];
    const contenedorApp = document.getElementById('app');

    if(contenedorApp){
        contenedorApp.innerHTML = '<h1>Listado de entidades</h1>';
        const contenedorTarjetas = document.createElement('div');
        contenedorTarjetas.classList.add('contenedorTarjetas');
        contenedorApp.appendChild(contenedorTarjetas);
    
        // Resuelve cada promesa por separado en paralelo sin esperar a que se resuelva la primera
        entidades.forEach(entidad => {
            App.obtenerDatos(entidad).then(datos => {
                const tarjeta = utilidades.cargarTarjetas(entidad, datos.length);
                contenedorTarjetas.appendChild(tarjeta);
            });
        });
        
        // Evento para acceder a las paginas de mantenimiento de cada entidad
        contenedorTarjetas.addEventListener('click', (e) => {
            if (e.target.closest('.tarjeta')) {
                const tarjeta = e.target.closest('.tarjeta').id;
                window.location.href = `./mantenimiento/${tarjeta}.html`;
            }
        });
    }
});

export default App;
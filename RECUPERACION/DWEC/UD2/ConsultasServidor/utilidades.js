// Metodo para guardar los datos de la API en localStorage
function guardarLocalStorage(datos, entidades) {
    for (let n = 0; n < datos.length; n++) {
        localStorage.setItem(entidades[n], JSON.stringify(datos[n]));
    }
}

// Metodo para cargar las tarjetas de cada entidad de la API
function cargarTarjetas(nombre, cantidad) {
    const tarjeta = document.createElement('div');
    tarjeta.classList.add('tarjeta');
    tarjeta.setAttribute('id', nombre);

    tarjeta.innerHTML = `
        <p>Nombre: <b>${nombre.toUpperCase()}</b></p>
        <p>Nº elementos: <b>${cantidad}</b></p>
    `;

    return tarjeta;
}

function cargarListadoUsers(datos) {
    const listado = document.getElementById('listado');
    listado.innerHTML = '';

    for(let dato of datos){
        const filaListado = document.createElement('div');
        filaListado.classList.add('fila');
        filaListado.setAttribute('data-id', dato.id);
    
        filaListado.innerHTML += `
            <div>${dato.username}</div>
            <div>${dato.name}</div>
            <div>${dato.email}</div>
            <div>${dato.address.city}, ${dato.address.street}</div>
            <div>${dato.phone}</div>
            <div>${dato.company.name}</div>
            <div>${dato.website}</div>
            <div>
                <!-- Filtrar por id de usuario -->
                <a href="./posts.html">Pendientes</a>
                <a href="./albums.html">Albumes</a>
                <a href="./posts.html">Post</a>
            </div>
        `;

        listado.appendChild(filaListado);
    }
}

function cargarListadoTodos(datos){
    const listado = document.getElementById('listado');
    listado.innerHTML = '';

    for(let dato of datos){
        const filaListado = document.createElement('div');
        filaListado.classList.add('fila');
        filaListado.setAttribute('data-id', dato.id);
    
        // Cambiar userId por nombre de autor
        filaListado.innerHTML += `
            <div>${dato.userId}</div>
            <div>${dato.title}</div>
            <div>${dato.completed ? 'Si' : 'No'}</div>
        `;

        listado.appendChild(filaListado);
    }
}


export {guardarLocalStorage, cargarTarjetas, cargarListadoUsers, cargarListadoTodos};
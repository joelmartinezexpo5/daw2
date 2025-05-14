import App from '../index.js';

const form = document.getElementById('form');

const nombre = document.getElementById('nombre');
const apellidos = document.getElementById('apellidos');
const email = document.getElementById('email');
const direccion = document.getElementById('direccion');
const telefono = document.getElementById('telefono');
const compañia = document.getElementById('compañia');
const web = document.getElementById('web');

window.addEventListener('load', () => {
    const parametros = new URLSearchParams(window.location.search);
    const idUsuario = parseInt(parametros.get('id'));

    const users = JSON.parse(localStorage.getItem('users'));

    // Si recupera el id del usuario continua el codigo
    if (idUsuario) {
        const usuarioEditar = users.filter(user => user.id === idUsuario)[0];

        nombre.value = usuarioEditar.username;
        apellidos.value = usuarioEditar.name;
        email.value = usuarioEditar.email;
        direccion.value = usuarioEditar.address.street;
        telefono.value = usuarioEditar.phone;
        compañia.value = usuarioEditar.company.name;
        web.value = usuarioEditar.website;

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            usuarioEditar.username = nombre.value;
            usuarioEditar.name = apellidos.value;
            usuarioEditar.email = email.value;
            usuarioEditar.address.street = direccion.value;
            usuarioEditar.phone = telefono.value;
            usuarioEditar.company.name = compañia.value;
            usuarioEditar.website = web.value;

            // Almaceno la promesa
            const promesa = App.actualizarDatos(`users/${idUsuario}`, usuarioEditar);

            // Resuelvo la promesa
            promesa.then((response) => {
                console.log(response);
            }).catch((error) => {
                console.error('Error en la solicitud: ', error.message);
            });
        })
    }

});
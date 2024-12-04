const campoNombre = document.getElementById('nombre');
const errorNombre = document.getElementById('errorNombre');
const campoEmail = document.getElementById('email');
const errorEmail = document.getElementById('errorEmail')
const campoPassword = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const fechaNacimiento = document.getElementById('fechaNacimiento');
const telefono = document.getElementById('telefono');
const genero = document.getElementById('genero');
const terminos = document.getElementById('terminos')


campoNombre.addEventListener('input', () => {
    let mensaje = "";

    if (campoNombre.value.length < 3) {
        mensaje = 'El nombre debe tener al menos 3 caracteres.';
    }
    else if (!/^[^0-9]+$/.test(campoNombre.value)) {
        mensaje = 'El nombre no debe contener números.';
    }

    errorNombre.textContent = mensaje;
})

campoEmail.addEventListener('input', () => {
    let mensaje = "";

    if(!/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/.test(campoEmail.value)){
        let mensaje = "La direccion de correo es incorrecta";
    }

    errorEmail.textContent = mensaje;
})
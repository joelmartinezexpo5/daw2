import ValidacionError from "./ValidacionError.js";

function validarNoVacio(valor, campo, callback) {
  if (!valor || !valor.trim()) {
    callback(null, new ValidacionError(`El campo ${campo} no puede estar vacío`, campo));
  } else {
    callback(valor.trim(), null);
  }
}

function validarPrecio(valor, callback) {
  const num = Number(valor);
  if (isNaN(num) || num <= 0) {
    callback(null, new ValidacionError("El precio debe ser mayor que cero", "precio"));
  } else {
    callback(num, null);
  }
}

function validarFechaPublicacion(valor, callback) {
  if (!valor) {
    callback(null, new ValidacionError("La fecha de publicación es obligatoria", "publicacion"));
    return;
  }
  const fecha = new Date(valor);
  const hoy = new Date();
  if (fecha > hoy) {
    callback(null, new ValidacionError("La fecha de publicación no puede ser futura", "publicacion"));
  } else {
    callback(valor, null);
  }
}

function validarTipo(valor, callback) {
  const tiposValidos = ["novela", "ensayo", "infantil"];
  if (!tiposValidos.includes(valor)) {
    callback(null, new ValidacionError("Debe seleccionar un tipo válido", "tipo"));
  } else {
    callback(valor, null);
  }
}

function mostrarError(error) {
  alert(error.message);
  document.getElementById(error.campo)?.classList.add('error');
}

function limpiarErrores() {
  document.querySelectorAll('input, select').forEach(el => el.classList.remove('error'));
}

const form = document.getElementById('form-libro');
const btnGuardar = document.getElementById('btn-guardar');

btnGuardar.addEventListener('click', (e) => {
  e.preventDefault();

  limpiarErrores();

  const titulo = document.getElementById('titulo').value;
  const autor = document.getElementById('autor').value;
  const publicacion = document.getElementById('publicacion').value;
  const precio = document.getElementById('precio').value;
  const tipo = document.getElementById('tipo').value;

  validarNoVacio(titulo, 'titulo', (tituloVal, error) => {
    if (error) return mostrarError(error);

    validarNoVacio(autor, 'autor', (autorVal, error) => {
      if (error) return mostrarError(error);

      validarFechaPublicacion(publicacion, (fechaVal, error) => {
        if (error) return mostrarError(error);

        validarPrecio(precio, (precioVal, error) => {
          if (error) return mostrarError(error);

          validarTipo(tipo, (tipoVal, error) => {
            if (error) return mostrarError(error);

            // Todo válido, aquí podrías disparar el evento submit o tu función para enviar el formulario
            form.submit(); // o llama a la función que maneja el envío
          });
        });
      });
    });
  });
});

export {
  validarNoVacio,
  validarPrecio,
  validarFechaPublicacion,
  validarTipo,
  mostrarError,
  limpiarErrores,
};

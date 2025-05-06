document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const inputs = {
      nombre: document.querySelector("#nombre"),
      email: document.querySelector("#email"),
      password: document.querySelector("#password"),
      confirmPassword: document.querySelector("#confirmPassword"),
      fechaNacimiento: document.querySelector("#fechaNacimiento"),
      telefono: document.querySelector("#telefono"),
      genero: document.querySelector("#genero"),
      terminos: document.querySelector("#terminos"),
    };
    const resultado = document.getElementById("resultado");
    const button = form.querySelector("button");
  
    const errores = {};
  
    function validarNombre() {
      const valor = inputs.nombre.value.trim();
      if (!valor) {
        errores.nombre = "El nombre es obligatorio.";
      } else if (valor.length < 3) {
        errores.nombre = "Debe tener al menos 3 caracteres.";
      } else if (/\d/.test(valor)) {
        errores.nombre = "No debe contener números.";
      } else {
        delete errores.nombre;
      }
      mostrarError("nombre");
    }
  
    function validarEmail() {
      const valor = inputs.email.value.trim();
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!valor) {
        errores.email = "El correo es obligatorio.";
      } else if (!emailRegex.test(valor)) {
        errores.email = "Debe tener un formato válido.";
      } else {
        delete errores.email;
      }
      mostrarError("email");
    }
  
    function validarPassword() {
      const valor = inputs.password.value;
      const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/;
      if (!valor) {
        errores.password = "La contraseña es obligatoria.";
      } else if (!regex.test(valor)) {
        errores.password = "Debe tener al menos 8 caracteres, una mayúscula, un número y un símbolo.";
      } else {
        delete errores.password;
      }
      mostrarError("password");
      validarConfirmPassword(); // Revalida la confirmación
    }
  
    function validarConfirmPassword() {
      if (!inputs.confirmPassword.value) {
        errores.confirmPassword = "Confirme su contraseña.";
      } else if (inputs.confirmPassword.value !== inputs.password.value) {
        errores.confirmPassword = "Las contraseñas no coinciden.";
      } else {
        delete errores.confirmPassword;
      }
      mostrarError("confirmPassword");
    }
  
    function validarFechaNacimiento() {
      const valor = new Date(inputs.fechaNacimiento.value);
      const hoy = new Date();
      const edad = hoy.getFullYear() - valor.getFullYear();
      if (!inputs.fechaNacimiento.value) {
        errores.fechaNacimiento = "La fecha es obligatoria.";
      } else if (edad < 16 || (edad === 16 && hoy < new Date(valor.setFullYear(valor.getFullYear() + 16)))) {
        errores.fechaNacimiento = "Debe tener al menos 16 años.";
      } else {
        delete errores.fechaNacimiento;
      }
      mostrarError("fechaNacimiento");
    }
  
    function validarTelefono() {
      const valor = inputs.telefono.value.trim();
      if (valor && !/^\d{9}$/.test(valor)) {
        errores.telefono = "Debe tener exactamente 9 dígitos.";
      } else {
        delete errores.telefono;
      }
      mostrarError("telefono");
    }
  
    function validarGenero() {
      if (!inputs.genero.value) {
        errores.genero = "Debe seleccionar una opción.";
      } else {
        delete errores.genero;
      }
      mostrarError("genero");
    }
  
    function validarTerminos() {
      if (!inputs.terminos.checked) {
        errores.terminos = "Debe aceptar los términos.";
      } else {
        delete errores.terminos;
      }
      mostrarError("terminos");
    }
  
    function mostrarError(campo) {
      const input = inputs[campo];
      let errorEl = input.parentElement.querySelector(".error");
      if (!errorEl) {
        errorEl = document.createElement("div");
        errorEl.classList.add("error");
        input.parentElement.appendChild(errorEl);
      }
      if (errores[campo]) {
        errorEl.textContent = errores[campo];
        input.classList.add("invalido");
        input.classList.remove("valido");
      } else {
        errorEl.textContent = "";
        input.classList.remove("invalido");
        input.classList.add("valido");
      }
      actualizarBoton();
    }
  
    function actualizarBoton() {
      button.disabled = Object.keys(errores).length > 0;
    }
  
    // Eventos
    inputs.nombre.addEventListener("input", validarNombre);
    inputs.email.addEventListener("input", validarEmail);
    inputs.password.addEventListener("input", validarPassword);
    inputs.confirmPassword.addEventListener("input", validarConfirmPassword);
    inputs.fechaNacimiento.addEventListener("input", validarFechaNacimiento);
    inputs.telefono.addEventListener("input", validarTelefono);
    inputs.genero.addEventListener("change", validarGenero);
    inputs.terminos.addEventListener("change", validarTerminos);
  
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      validarNombre();
      validarEmail();
      validarPassword();
      validarConfirmPassword();
      validarFechaNacimiento();
      validarTelefono();
      validarGenero();
      validarTerminos();
  
      if (Object.keys(errores).length === 0) {
        const datos = {
          nombre: inputs.nombre.value,
          email: inputs.email.value,
          fechaNacimiento: inputs.fechaNacimiento.value,
          telefono: inputs.telefono.value,
          genero: inputs.genero.value,
        };
        resultado.innerHTML = `<p style="color: green;">Registro exitoso</p><pre>${JSON.stringify(datos, null, 2)}</pre>`;
        form.reset();
        document.querySelectorAll("input, select").forEach(el => {
          el.classList.remove("valido");
        });
      } else {
        let listaErrores = Object.values(errores)
          .map(err => `<li>${err}</li>`)
          .join("");
        resultado.innerHTML = `<ul style="color: red;">${listaErrores}</ul>`;
      }
    });
  });
  
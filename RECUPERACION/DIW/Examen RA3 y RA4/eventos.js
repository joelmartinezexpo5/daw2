// eventos.js

document.addEventListener('DOMContentLoaded', function () {
  // Buscador animado
  const lupa = document.getElementById('lupa');
  const buscador = document.querySelector('.buscador');

  lupa.addEventListener('click', function (e) {
    buscador.classList.toggle('expandido');
    e.stopPropagation();
  });

  document.body.addEventListener('click', function () {
    buscador.classList.remove('expandido');
  });

  // Encuesta dinámica
  const botones = document.querySelectorAll('.opcion');
  const pregunta2 = document.getElementById('segunda-pregunta');
  const resultado = document.getElementById('resultado-recomendacion');

  botones.forEach(b => {
    b.addEventListener('click', () => {
      const tipo = b.dataset.tipo;
      pregunta2.innerHTML = '';
      resultado.innerHTML = '';

      if (tipo === 'cine') {
        pregunta2.innerHTML = `
          <p class="mt-3">¿Qué tipo de película prefieres?</p>
          <button class="btn btn-outline-light subopcion" data-respuesta="comedia">Comedia</button>
          <button class="btn btn-outline-light subopcion" data-respuesta="accion">Acción</button>
        `;
      } else {
        pregunta2.innerHTML = `
          <p class="mt-3">¿Qué tipo de serie prefieres?</p>
          <button class="btn btn-outline-light subopcion" data-respuesta="largas">Series largas</button>
          <button class="btn btn-outline-light subopcion" data-respuesta="tarde">Para una tarde</button>
        `;
      }

      document.querySelectorAll('.subopcion').forEach(sub => {
        sub.addEventListener('click', () => {
          const r = sub.dataset.respuesta;
          let html = '';

          switch (r) {
            case 'comedia':
              html = "Te recomendamos una comedia divertida como 'Malas madres'<br><img src='imagen/madres.jpg' class='img-fluid mt-2'>";
              break;
            case 'accion':
              html = "Una buena opción es 'Una boda explosiva.'<br><img src='imagen/boda.jpg' class='img-fluid mt-2'>";
              break;
            case 'largas':
              html = "Si te gustan las series de varias temporadas, The White Lotus es tu opción<br><img src='imagen/whitelotus.jpg' class='img-fluid mt-2'>";
              break;
            case 'tarde':
              html = "Para una tarde rápida, 'Yellowstone.'<br><img src='img/yellowstone.jpg' class='img-fluid mt-2'>";
              break;
          }

          resultado.innerHTML = html;
        });
      });
    });
  });
});

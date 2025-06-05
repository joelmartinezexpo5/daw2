document.addEventListener('DOMContentLoaded', () => {
    let contador = 0;
    const boton = document.getElementById('contadorBtn');
    const contadorTexto = document.getElementById('contador');

    boton.addEventListener('click', () => {
        contador++;
        contadorTexto.textContent = `Contador: ${contador}`;

        // Cambiar el texto del botón según el umbral
        if (contador === 15) {
            boton.textContent = 'Increible';
            contador = 0;
            contadorTexto.textContent = 'Contador: 0';
        } else if (contador >= 10) {
            boton.textContent = 'Eres un campeón';
        } else if (contador >= 5) {
            boton.textContent = 'Vas en racha';
        }else if(contador >= 0){
            boton.textContent = 'Haz click'
        }
    });
});
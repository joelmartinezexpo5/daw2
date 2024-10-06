/**
 * 12-Juego acertar número. 
 * Calcula un numero aleatorio entre 1 y 100, este número permanecerá secreto. Pide al usuario 
 * un numero en rango, el programa le dirá si es mayor o menor que el número secreto. Si el 
 * usuario acierta el número secreto gana. El usuario dispondrá de 5 intentos para acertar el 
 * número secreto, tras lo cual, el programa dirá que ha perdido y le mostrará el número secreto. 
 * Añade el código auxiliar necesario para probar la aplicación. 
 */

function juegoAdivinarNumero() {
    let numeroSecreto = Math.floor(Math.random() * 100) + 1;
    let intentosRestantes = 5;
    let haGanado = false;

    while (intentosRestantes > 0 && !haGanado) {
        let numeroUsuario = parseInt(prompt(`Introduce un número entre 1 y 100 (Intentos restantes: ${intentosRestantes}):`), 10);

        if (isNaN(numeroUsuario) || numeroUsuario < 1 || numeroUsuario > 100) {
            alert("Por favor, introduce un número válido entre 1 y 100.");
            continue;
        }

        if (numeroUsuario === numeroSecreto) {
            alert("¡Felicidades! Has acertado el número secreto.");
            haGanado = true;
        } else if (numeroUsuario > numeroSecreto) {
            alert("El número es menor.");
        } else {
            alert("El número es mayor.");
        }

        intentosRestantes--;
    }

    if (!haGanado) {
        alert(`Has perdido. El número secreto era ${numeroSecreto}.`);
    }
}

juegoAdivinarNumero();

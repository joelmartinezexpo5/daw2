/**
 * 13-Juego mates 
 * Crea un programa que genere dos números aleatorios entre 1 y 10, y un operador aritmético. 
 * Se ofrecerá al usuario los valores para que calcule el resultado, y el programa le dirá si el 
 * resultado es correcto o incorrecto.  
 * Las preguntas, respuesta del usuario y si ha acertado o fallado se almacenarán ordenadamente 
 * en un array.  
 * Se preguntas se realizarán en lotes de 4, tras lo cual se consultará al usuario si desea continuar. 
 * Cuando el usuario no desee seguir jugando se mostrará un resumen de las preguntas (número, 
 * pregunta y acierto) así como el total de preguntas acertadas y el total de falladas. 
 * Añade el código auxiliar necesario para probar la aplicación. 
 */

function generarPregunta() {
    let num1 = Math.floor(Math.random() * 10) + 1;
    let num2 = Math.floor(Math.random() * 10) + 1;
    let operadores = ['+', '-', '*', '/'];
    let operador = operadores[Math.floor(Math.random() * operadores.length)];
    
    let resultado;
    switch (operador) {
        case '+':
            resultado = num1 + num2;
            break;
        case '-':
            resultado = num1 - num2;
            break;
        case '*':
            resultado = num1 * num2;
            break;
        case '/':
            resultado = parseFloat((num1 / num2).toFixed(2));
            break;
    }

    return {
        num1: num1,
        num2: num2,
        operador: operador,
        resultado: resultado
    };
}

function juegoMates() {
    let historialPreguntas = [];
    let continuar = true;
    let aciertos = 0;
    let fallos = 0;

    while (continuar) {
        for (let i = 0; i < 4; i++) {
            let pregunta = generarPregunta();
            let respuestaUsuario = parseFloat(prompt(`¿Cuánto es ${pregunta.num1} ${pregunta.operador} ${pregunta.num2}?`));

            let esCorrecto = (respuestaUsuario === pregunta.resultado);
            if (esCorrecto) {
                alert("¡Correcto!");
                aciertos++;
            } else {
                alert(`Incorrecto. La respuesta correcta era ${pregunta.resultado}.`);
                fallos++;
            }

            historialPreguntas.push({
                pregunta: `${pregunta.num1} ${pregunta.operador} ${pregunta.num2}`,
                respuestaUsuario: respuestaUsuario,
                esCorrecto: esCorrecto
            });
        }

        continuar = confirm("¿Quieres seguir jugando?");
    }

    mostrarResumen(historialPreguntas, aciertos, fallos);
}

function mostrarResumen(historial, aciertos, fallos) {
    console.log("Resumen del juego:");
    historial.forEach((item, index) => {
        console.log(`${index + 1}. Pregunta: ${item.pregunta}, Respuesta: ${item.respuestaUsuario}, Acierto: ${item.esCorrecto ? 'Sí' : 'No'}`);
    });
    console.log(`Total de preguntas acertadas: ${aciertos}`);
    console.log(`Total de preguntas falladas: ${fallos}`);
}

juegoMates();

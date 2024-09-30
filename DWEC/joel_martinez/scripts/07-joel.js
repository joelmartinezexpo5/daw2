// 7-Crea una función que reciba un número e imprima la tabla de multiplicar.
// Crea una función que solicite dos números entre 0 y 10, y que imprima las tablas de multiplicar
// entre los números indicados. Las tablas aparecerán desde el número más pequeño al mayor
// (aquí hay validaciones).
// Añade el código auxiliar necesario para probar la aplicación.

function imprimirTablaMultiplicar(numero) {
    for (let i = 1; i <= 10; i++) {
        console.log(`${numero} x ${i} = ${numero * i}`);
    }
}

function imprimirTablasMultiplicarEntre(rangoMin, rangoMax) {
    if (rangoMin < 0 || rangoMax > 10 || rangoMin > rangoMax) {
        console.log("Error: Ingresa números entre 0 y 10.");
        return;
    }
    for (let numero = rangoMin; numero <= rangoMax; numero++) {
        imprimirTablaMultiplicar(numero);
    }
}

function solicitarNumerosYImprimirTablas() {
    let numero1 = parseInt(prompt("Ingresa el primer número entre 0 y 10: "));
    let numero2 = parseInt(prompt("Ingresa el segundo número entre 0 y 10: "));
    let menor = Math.min(numero1, numero2);
    let mayor = Math.max(numero1, numero2);
    imprimirTablasMultiplicarEntre(menor, mayor);
}

solicitarNumerosYImprimirTablas();

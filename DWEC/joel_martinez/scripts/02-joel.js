// 2-Realiza un programa que solicite números al usuario hasta que introduzca un 0. Y que
// muestre los valores: máximo, mínimo, suma, media y total de números introducidos.


"use strict";

let numero;
let maximo = null;
let minimo = null;
let suma = 0;
let media = 0;
let totalNumeros = 0;


do {
    numero = parseInt(prompt('Introduce un numero(0 para finalizar)'));

    if (numero !== 0) {
        if (maximo < numero) {
            maximo = numero;
        }
    }
    if (numero > minimo) {
        minimo = numero;
    }

    suma += numero;
    ++totalNumeros
} while (numero != 0);

media = suma / totalNumeros;

alert("Máximo: " + maximo + "\n" +
    "Mínimo: " + minimo + "\n" +
    "Suma: " + suma + "\n" +
    "Media: " + media + "\n" +
    "Total de números introducidos: " + totalNumeros);

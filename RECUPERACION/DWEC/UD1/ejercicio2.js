'use strict'

let numeros = [];
let input

do {
    input = parseFloat(prompt('Introduce un numero'))
    if(input !== 0){
        numeros.push(input);
    }
} while(input !== 0);

if(numeros.length > 0){
    let maximo = Math.max(...numeros);
    let minimo = Math.min(...numeros);
    let suma = 0;
    let totalNumeros = numeros.length;

    for(let i = 0; i < numeros.length; i++){
        suma += numeros[i];
    }

    let media = suma / numeros.length;

    alert(`Maximo: ${maximo} \nMinimo: ${minimo} \nSuma: ${suma} \nMedia: ${media} \nTotal numeros: ${totalNumeros}`);
}

console.log(numeros);
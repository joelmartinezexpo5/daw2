//Ejercicio 2. Sucesión de Fibonacci.
'use strict'
function fibonacci(n){
    let fibonacci = [0,1];
    for(let i=0; i<n-2; ++i){
        let nuevoNumero = fibonacci[i] + fibonacci[i + 1];
        fibonacci.push(nuevoNumero);
    }
    return fibonacci;
}
console.log(fibonacci(9));
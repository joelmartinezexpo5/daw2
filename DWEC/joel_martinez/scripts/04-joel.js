// 4- Crea una función reciba un número y que dibuje un triángulo de altura el tamaño del
// número indicado. El valor devuelto será un array con cada una de las cadenas que forman el
// rectángulo.
// Añade el código auxiliar necesario para probar la aplicación.

function dibujarTrianguloIsosceles(altura) {
    let triangulo = new Array(altura);

    for (let i = 0; i < altura; ++i) {
        let espacios = '';
        let asteriscos = '';

        for (let j = 0; j < altura - i - 1; ++j) {
            espacios += ' ';
        }

        for (let j = 0; j < i + 1; ++j) {
            asteriscos += '* ';
        }

        triangulo[i] = espacios + asteriscos.trim();
    }

    return triangulo;
}

let altura = 10;  
let resultado = dibujarTrianguloIsosceles(altura);

for (let indice in resultado) {
    console.log(resultado[indice]);
}

  
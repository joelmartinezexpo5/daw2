// 4- Crea una función reciba un número y que dibuje un triángulo de altura el tamaño del
// número indicado. El valor devuelto será un array con cada una de las cadenas que forman el
// rectángulo.
// Añade el código auxiliar necesario para probar la aplicación.

function dibujarTriangulo(altura){
    let triangulo = [];

    for(let i = 1; i <= altura; i++){
        triangulo.push('* '.repeat(i).trim());
    }

    return triangulo;
}

//Probar aplicacion
let altura = 5;
let resultado = dibujarTriangulo(altura);

//Triangulo en la consola
for(let i in resultado){
    console.log(resultado[i])
}
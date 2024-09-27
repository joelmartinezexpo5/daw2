// 3-Crea una función reciba un número y que dibuje un rectángulo hueco de lado del tamaño del
// número indicado. El valor devuelto será un array con cada una de las cadenas que forman el
// rectángulo.
// Añade el código auxiliar necesario para probar la aplicación.

function dibujarCuadrado(tamano) {
    let cuadrado = new Array(tamano);

    for (let i = 0; i < tamano; ++i) {
        let linea = '';
        
        for (let j = 0; j < tamano; ++j) {
            if (i === 0 || i === tamano - 1 || j === 0 || j === tamano - 1) {
                linea += '* ';
            } else {
                linea += '  ';
            }
        }

        cuadrado[i] = linea.trim();
    }

    return cuadrado;
}

let tamano = 5;
let resultado = dibujarCuadrado(tamano);

for (let i of resultado) {
    console.log(i);
}





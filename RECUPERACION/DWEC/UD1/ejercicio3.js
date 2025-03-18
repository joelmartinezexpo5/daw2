'use strict'

function dibujarRectangulo(tamanio) {
    let rectangulo = [];

    for(let i = 0; i < tamanio; i++) {
        let linea = '';
        for(let j = 0; j < tamanio; j++) {
            if(i === 0 || i === tamanio-1 || j === 0 || j === tamanio-1) {
                linea += '*';
            } else {
                linea += ' ';
            }
        }
        rectangulo.push(linea);
    }

    return rectangulo;
}
console.log(dibujarRectangulo(5));

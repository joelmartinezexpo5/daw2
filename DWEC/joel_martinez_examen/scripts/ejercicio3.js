'use strict'

function dibujarFigura(lado, caracter1, caracter2) {
    let resultado = [];
    for (let i = 0; i < lado; ++i) {
        let c1 = '';
        let c2 = '';
        for (let j = 0; j < lado; ++j) {
            c1 += caracter1;
            resultado[j] = c1
        }
        for (let h = lado - 2; h >= 0; --h) {
            c2 += caracter2
            resultado[h] += c2;
        }
    }
    return resultado;
}

console.log(dibujarFigura(5, 's', 'b'));
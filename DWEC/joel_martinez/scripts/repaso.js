'use strict'

function dibujarCuadrado(tamano) {
    let resultado = [];

    for (let i = 0; i < tamano; ++i) {
        let linea = '';
        for (let j = 0; j < tamano; ++j) {
            if (i === 0 || i === tamano - 1 || j === 0 || j === tamano - 1) {
                linea += '*  '
            } else {
                linea += '   '
            }
        }
        resultado[i] = linea;
    }
    return resultado;
}

function dibujarTriangulo(tamano) {
    let resultado = [];

    for (let i = 0; i < tamano; ++i) {
        let asteriscos = '';
        let espacios = '';

        for (let j = 0; j < tamano - i - 1; ++j) {
            espacios += '  ';
        }

        for (let j = 0; j < i + 1; ++j) {
            asteriscos += '*  ';
        }

        resultado[i] = espacios + asteriscos;
    }

    return resultado;
}



let tamano = 6;
let tamano2 = 5;
let resultado = dibujarCuadrado(tamano);
let resultado2 = dibujarTriangulo(tamano2);

for (let i of resultado2) {
    console.log(i);
}

for (let i of resultado) {
    console.log(i);
}
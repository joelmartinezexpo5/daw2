// 6-Crea una función que dibuje en un alert la figura geométrica indicada por parámetro. Donde
// el primer parámetro será la función que genera el polígono y el segundo parámetro el número
// que indica el tamaño del polígono.
// Deberás definir un menú que solicite el polígono a representar: cuadrado hueco, triangulo,
// rombo. Y después solicitar el tamaño al usuario. Incluye una opción de terminar.
// Añade el código auxiliar necesario para probar la aplicación.

//Cuadrado
'use strict'
function dibujarCuadrado(tamano) {
    let cuadrado = new Array(tamano);

    for (let i = 0; i < tamano; ++i) {
        let linea = '';
        
        for (let j = 0; j < tamano; ++j) {
            if (i === 0 || i === tamano - 1 || j === 0 || j === tamano - 1) {
                linea += '*  ';
            } else {
                linea += '    ';
            }
        }

        cuadrado[i] = linea.trim();
    }

    return cuadrado;
}

//Triangulo
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

//Rombo
function dibujarRombo(tamano) {
    let rombo = new Array(tamano * 2 - 1);

    for (let i = 0; i < tamano; i++) {
        let espacios = '';
        let asteriscos = '';

        for (let j = 0; j < tamano - i - 1; ++j) {
            espacios += ' ';
        }

        for (let j = 0; j < i + 1; ++j) {
            asteriscos += '* ';
        }

        rombo[i] = espacios + asteriscos.trim();
    }

    for (let i = tamano - 2; i >= 0; i--) {
        let espacios = '';
        let asteriscos = '';

        for (let j = 0; j < tamano - i - 1; ++j) {
            espacios += ' ';
        }

        for (let j = 0; j < i + 1; ++j) {
            asteriscos += '* ';
        }

        rombo[2 * tamano - i - 2] = espacios + asteriscos.trim();
    }

    return rombo;
}

let figura =parseInt(prompt("Indica la figura que quieres dibujar \n1. Cuadrado \n2. Triangulo \n3. Rombo"));
let tamano =parseInt(prompt("Indica la altura de la figura."));

switch(figura){

    case 1:
        alert(dibujarCuadrado(tamano).join('\n'));
        break;
    case 2:
        alert(dibujarTrianguloIsosceles(tamano).join('\n'));
        break;
    case 3:
        alert(dibujarRombo(tamano).join('\n'));
        break;
    default:
        alert('ERROR: Opcion no valida')
}

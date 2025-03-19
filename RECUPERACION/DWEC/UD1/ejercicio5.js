'use strict'
function dibujarRombo(tamanio) {
    let rombo = [];
    // Parte superior del rombo
    for (let i = 0; i < tamanio; i++) {
        let linea = "";
        for (let j = 0; j < tamanio - i - 1; j++) {
            linea += " ";
        }
        for (let k = 0; k < i + 1; k++) {
            linea += "* ";
        }
        rombo.push(linea);
    }

    // Parte inferior del rombo
    for (let i = tamanio - 2; i >= 0; i--) {
        let linea = "";
        for (let j = 0; j < tamanio - i - 1; j++) {
            linea += " ";
        }
        for (let k = 0; k < i + 1; k++) {
            linea += "* ";
        }
        rombo.push(linea);
    }
    return rombo;
}   

console.log(dibujarRombo(5))
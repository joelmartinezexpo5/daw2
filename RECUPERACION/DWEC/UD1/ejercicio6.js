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

function dibujarTriangulo(tamanio){
    let triangulo = [];
    for(let i=0; i<=tamanio; i++){
        let linea ="";
        for(let j=0; j<=tamanio;j++){
            linea += '*'
            triangulo.push(linea)
        }
        return triangulo;
    }
}

let terminar = false;
do {
    let figura = prompt(`Introduce la figura que quieres dibujar:\n1. Cuadrado\n2. Triangulo\n3. Rombo\n0. Salir`);
    if (figura === "0") {
        terminar = true;
        alert("Cerrando el programa");
        continue;
    }
    let altura = parseInt(prompt("Introduce la altura:"));
    dibujarFigura(figura, altura);
} while(!terminar);

function dibujarFigura(figura, tamanio) {
    switch(figura) {
        case "1":
            alert(dibujarRectangulo(tamanio).join('\n'));
            break;
        case "2":
            alert(dibujarTriangulo(tamanio).join('\n'));
            break;
        case "3":
            alert(dibujarRombo(tamanio).join('\n'));
            break;
        default:
            alert("Opción no válida");
            break;
    }   
}



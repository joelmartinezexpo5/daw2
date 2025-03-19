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

do{
    let figura = prompt(`Introduce la figura que quieres dibujar:\n1. Cuadrado\n2. Triangulo\n3. Rombo\n 0. Salir`);
    let altura = parseInt(prompt("Introduce la altura:"));
    let terminar = false;
    dibujarFigura(figura, altura);
}while(!terminar);

function dibujarFigura(figura, tamanio){
    switch(figura){
        case "cuadrado":
            alert(dibujarRectangulo(tamanio));
            terminar = false;
            break;
        case "triangulo":
            alert(dibujarTriangulo(tamanio));
            terminar = false;
            break;
        case "rombo":
            alert(dibujarRombo(tamanio));
            terminar = false;
            break;
        default:
            alert("Cerrando el programa");
            terminar = true;
            break;
    }   
}



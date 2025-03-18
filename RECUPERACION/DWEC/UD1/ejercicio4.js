'use strict'

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

console.log(dibujarTriangulo(5))
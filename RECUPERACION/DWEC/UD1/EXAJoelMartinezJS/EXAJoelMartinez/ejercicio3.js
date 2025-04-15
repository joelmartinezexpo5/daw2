'use strict'

function dibujarReloj(altura, caracter){
    let reloj = [];
    for(let i=altura-1; i>=0; i--){
        let linea= new Array(i);
        for(let k=0; k<= altura+i-1; k++){
            linea[k] = ' ';
        }
        for(let j=0; j < i*2+1; j++){
            linea[j] = `${caracter}`;
        }
        reloj.push(linea.reverse());
    }

    for(let i=0; i < altura; i++){
        let linea= new Array(i);
        for(let k=0; k<= altura+i-1; k++){
            linea[k]= ' ';
        }
        for(let j=0; j < i*2+1; j++){
            linea[j]= `${caracter}`;
        }
        reloj.push(linea.reverse());
    }
    return reloj;
}

console.log(dibujarReloj(5,'o'))
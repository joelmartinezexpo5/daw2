function esPrimo(num) {
    if (num < 2) return false;
    for (let i = 2; i <= Math.sqrt(num); i++) {
        if (num % i === 0) return false;
    }
    return true;
}

function analizarRango(inicio, fin){
    for(let i = inicio; i <= fin; i++){
        let mensaje = "";

        if(i % 3 === 0) mensaje += `${i} es multiplo de 3\n`; 
        if(i % 5 === 0) mensaje += `${i} es multiplo de 5\n`; 
        if(esPrimo(i)) mensaje += `${i} es primo\n`;
        
        if(mensaje !== "") alert(mensaje);
    }
}

let inicio = parseInt(prompt("Introduce el numero de inicio"));
let fin = parseInt(prompt("Introduce el numero final"));
analizarRango(inicio, fin);
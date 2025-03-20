function calcularAleatorio(){
    return Math.floor(Math.random() * 100);
}

function acertarNumero(numero){
    const MAX_INTENTOS = 5;
    let nAleatorio = calcularAleatorio();
    let intento = 1;
    
    do {
        if(numero === nAleatorio){
            alert("¡Has acertado!");
            return true;
        }else{
            if(numero > nAleatorio){
                alert(`Tu numero es mayor que el numero secreto. Te quedan ${MAX_INTENTOS - intento} intentos`);
            }else{
                alert(`Tu numero es menor que el numero secreto. Te quedan ${MAX_INTENTOS - intento} intentos`);
            }
            if(intento < MAX_INTENTOS){
                numero = parseInt(prompt("Introduce otro número:"));
            }
        }
        intento++;
    } while(intento <= MAX_INTENTOS);
    
    alert(`¡Game Over! El número era ${nAleatorio}`);
    return false;
}

let numero = parseInt(prompt("Introduce un numero para adivinar el numero secreto (0-99)"));
acertarNumero(numero);
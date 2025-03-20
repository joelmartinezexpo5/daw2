function calcularAleatorio(){
    return Math.floor(Math.random() * 100);
}

function acertarNumero(numero){
    let nAleatorio = calcularAleatorio();
    let intento = 0;
    do{
        if(numero === nAleatorio){
            alert("¡Has acertado!");
            intento = 5;
        }else if(numero > nAleatorio){
            alert("Tu numero es mayor que el numero secreto");
            intento++
        }else if(numero < nAleatorio){
            alert("Tu numero es menor que el numero secreto")
            intento++
        } 
    }while(intento !== 5);
}

let numero = parseInt(prompt("Introduce un numero para adivinar el numero secreto"));
acertarNumero(numero)
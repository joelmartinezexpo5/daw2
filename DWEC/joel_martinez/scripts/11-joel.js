/**
 * 11-Crea unafunciónque reciba un rango, para cada valor en el rango 
 * se informará de si el número es múltiplode 3, si es múltiplode 5 y 
 * si esnúmeroprimo.Sólo mostrar informaciónde los números que cumplan
 * alguna de las condiciones.Añade el código auxiliar necesario para 
 * probar la aplicación.
 */

function esPrimo(numero){

    for(let i = 2; i < Math.sqrt(numero);++i){
        if(numero % i === 0){
            return false;
        }
    }
    return true;
}

function evaluarRango(inicio, fin){
    for(let i = inicio; i < fin; ++i){
        let multiplo3 = (i % 3 === 0);
        let multiplo5 = (i % 5 === 0);
        let numeroPrimo = esPrimo(i);
    }

    if(multiplo3 || multiplo5 || numeroPrimo){
        let mensaje = `Numero ${i}`;
        if(multiplo3){
            mensaje += 'Multiplo de 3'
        } else if(multiplo5){
            mensaje += 'Multiplo de 5';
        }else{
            
        }
        if(multiplo5) mensaje += 'Multiplo de 5';
        if(numeroPrimo) mensaje += 'Es primo';
    }
}

numero = 5;
console.log(esPrimo(numero));
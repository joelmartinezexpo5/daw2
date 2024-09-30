// 8-Crea una función que reciba un número y calcule su factorial, la función devolverá una
// cadena con el desarrollo del factorial. Por ejemplo, para una entrada de 4 devolverá la cadena
// “4x3x2x1=24”.
// Añade el código auxiliar necesario para probar la aplicación. El script solicitará números al
// usuario hasta que no desee continuar.

function calcularFactorial(numero) {
    let factorial = 1;
    let desarrollo = `${numero}`;
    
    for (let i = numero - 1; i > 0; i--) {
        factorial *= i + 1;
        desarrollo += `x${i}`;
    }
    
    return `${desarrollo}= ${factorial}`;
}

function solicitarNumeros() {
    let continuar = true;
    
    while (continuar) {
        let numero = parseInt(prompt("Ingresa un número para calcular su factorial: "));
        
        if (!isNaN(numero) && numero >= 0) {
            let resultado = calcularFactorial(numero);
            console.log(resultado);
        } else {
            console.log("Por favor, ingresa un número válido.");
        }
        
        continuar = confirm("¿Deseas calcular otro factorial?");
    }
}

solicitarNumeros();

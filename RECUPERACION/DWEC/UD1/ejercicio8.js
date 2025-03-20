function calcularFactorial(n) {
    if (n < 0) return "Número inválido";
    
    let resultado = 1;
    let desarrollo = "";
    
    for (let i = n; i > 0; i--) {
        resultado *= i;
        desarrollo += i + (i > 1 ? "x" : "");
    }
    
    return desarrollo + "=" + resultado;
}

function ejecutarFactorial() {
    let continuar = true;
    
    while (continuar) {
        let num = parseInt(prompt("Introduce un número para calcular su factorial:"));
        alert(calcularFactorial(num));
        
        continuar = confirm("¿Deseas calcular otro factorial?");
    }
}

ejecutarFactorial();

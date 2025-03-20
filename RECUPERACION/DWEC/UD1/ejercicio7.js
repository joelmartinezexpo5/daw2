function imprimirTabla(numero) {
    for (let i = 1; i <= 10; i++) {
        console.log(`${numero} x ${i} = ${numero * i}`);
    }
}

function imprimirTablasEntre() {
    let num1 = Math.min(Math.max(parseInt(prompt("Primer número (0-10):")), 0), 10);
    let num2 = Math.min(Math.max(parseInt(prompt("Segundo número (0-10):")), 0), 10);
    
    if (isNaN(num1) || isNaN(num2)) {
        console.log("Introduce números válidos.");
        return;
    }
    
    for (let i = Math.min(num1, num2); i <= Math.max(num1, num2); i++) {
        console.log(`Tabla del ${i}:`);
        imprimirTabla(i);
        console.log('');
    }
}

imprimirTablasEntre();

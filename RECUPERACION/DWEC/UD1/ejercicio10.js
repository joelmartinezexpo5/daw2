function contarCaracteres(cadena) {
    let conteo = {};
    
    for (let char of cadena) {
        conteo[char] = (conteo[char] || 0) + 1;
    }
    
    return conteo;
}

let texto = prompt("Introduce una cadena de texto:");
console.log(contarCaracteres(texto));
// 9-Crea una función que reciba un número variable de parámetros y que los agrupe por tipo. 
// Después por cada tipo se mostrará el tipo y la colección de parámetros de ese tipo incluyendo 
// la posición original entre los parámetros.
// Añade el código auxiliar necesario para probar la aplicación.

'use strict';
function agruparPorTipo(...parametros) {
    let numeros = [];
    let posicionesNumeros = [];
    let strings = [];
    let posicionesStrings = [];
    let booleanos = [];
    let posicionesBooleanos = [];

    let indiceNumero = 0;
    let indiceString = 0;
    let indiceBoolean = 0;

    for (let i = 0; i < parametros.length; i++) {
        let tipo = typeof parametros[i];

        if (tipo === 'number') {
            numeros[indiceNumero] = parametros[i];
            posicionesNumeros[indiceNumero] = i;
            indiceNumero++;
        } else if (tipo === 'string') {
            strings[indiceString] = parametros[i];
            posicionesStrings[indiceString] = i;
            indiceString++;
        } else if (tipo === 'boolean') {
            booleanos[indiceBoolean] = parametros[i];
            posicionesBooleanos[indiceBoolean] = i;
            indiceBoolean++;
        }
    }

    // Mostrar los resultados agrupados por tipo
    if (numeros.length > 0) {
        console.log('Tipo: number');
        for (let i = 0; i < numeros.length; i++) {
            console.log(`  Valor: ${numeros[i]}, Posición original: ${posicionesNumeros[i]}`);
        }
    }

    if (strings.length > 0) {
        console.log('Tipo: string');
        for (let i = 0; i < strings.length; i++) {
            console.log(`  Valor: ${strings[i]}, Posición original: ${posicionesStrings[i]}`);
        }
    }

    if (booleanos.length > 0) {
        console.log('Tipo: boolean');
        for (let i = 0; i < booleanos.length; i++) {
            console.log(`  Valor: ${booleanos[i]}, Posición original: ${posicionesBooleanos[i]}`);
        }
    }

}

// Ejemplo de uso
agruparPorTipo(1, 'hola', true, 3.14, 'adiós');
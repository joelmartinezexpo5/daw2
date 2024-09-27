// 5- Crea una función reciba un número y que dibuje un rombo de diagonal del tamaño del
// número indicado. El valor devuelto será un array con cada una de las cadenas que forman el
// rombo.
// Añade el código auxiliar necesario para probar la aplicación.

function dibujarRombo(tamano) {
    let rombo = new Array(tamano * 2 - 1);

    for (let i = 0; i < tamano; i++) {
        let espacios = '';
        let asteriscos = '';

        for (let j = 0; j < tamano - i - 1; ++j) {
            espacios += ' ';
        }

        for (let j = 0; j < i + 1; ++j) {
            asteriscos += '* ';
        }

        rombo[i] = espacios + asteriscos.trim();
    }

    for (let i = tamano - 2; i >= 0; i--) {
        let espacios = '';
        let asteriscos = '';

        for (let j = 0; j < tamano - i - 1; ++j) {
            espacios += ' ';
        }

        for (let j = 0; j < i + 1; ++j) {
            asteriscos += '* ';
        }

        rombo[2 * tamano - i - 2] = espacios + asteriscos.trim();
    }

    return rombo;
}

let tamano = 5; 
let resultado = dibujarRombo(tamano);

for (let i of resultado) {
    console.log(i);
}


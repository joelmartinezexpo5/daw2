const $bingo = (function () {
    let cartones = [];
    let bolasSacadas = [];
    let marcador = [];

    function generarNumeroAleatorio(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function generarCartones() {
        const carton = [[], [], []];

        for (let col = 0; col < 9; ++col) {
            let numerosColumna = [];
            let min = col * (10 + 1); 
            let max = col === 8 ? 90 : (col + 1) * 10; 

            // Generar 3 números únicos para cada columna
            while (numerosColumna.length < 3) {
                let numero = generarNumeroAleatorio(min, max);
                // // Comprobar que el número no esté ya en el array
                // if (!numerosColumna.includes(numero)) {
                    numerosColumna.push(numero);
                // }
            }

            // Ordenar los números en la columna
            numerosColumna.sort((a, b) => a - b);

            // Asignar los números a las filas del cartón
            for (let fila = 0; fila < 3; ++fila) {
                carton[fila][col] = numerosColumna[fila] || null; // Colocar null si no hay número
            }
        }

        console.log(carton); // Muestra el cartón en formato tabla
        return carton;
    }

    function inicializarJuego() {
        for (let i = 0; i < 3; ++i) { // Generar 3 cartones
            cartones.push(generarCartones());
        }
        console.log("Cartones generados:");
        console.log(cartones); // Muestra todos los cartones generados
    }

    return {
        generarCartones,
        inicializarJuego,
    };
})();

// Llamar a la función inicializarJuego para ejecutar el código
$bingo.inicializarJuego();







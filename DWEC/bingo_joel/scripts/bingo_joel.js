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

            while (numerosColumna.length < 3) {
                let numero = generarNumeroAleatorio(min, max);
                numerosColumna.push(numero);
            }

            numerosColumna.sort((a, b) => a - b);

            for (let fila = 0; fila < 3; ++fila) {
                carton[fila][col] = numerosColumna[fila] || null;
            }
        }

        for (let col = 0; col < 9; ++col) {
            let indice = generarNumeroAleatorio(0, 2);
            if(carton[indice][col] === null){
                --col
            }else{
                carton[indice][col] = null;
            }
            
        }




        console.log(carton);
        return carton;
    }

    function inicializarJuego() {
        for (let i = 0; i < 3; ++i) {
            cartones.push(generarCartones());
        }
        console.log("Cartones generados:");
        console.log(cartones)
    }

    return {
        generarCartones,
        inicializarJuego,
    };
})();

//$bingo.inicializarJuego();

window.addEventListener('load', function () {

    const comenzarBtn = document.getElementById('comenzarBtn');
    const cantarLineaBtn = document.getElementById('cantarLineaBtn');
    const cantarBingoBtn = document.getElementById('cantarBingoBtn');

    comenzarBtn.addEventListener('click', function () {
        //const tiempo = document.getElementById('tiempoInput')
        $bingo.inicializarJuego();

    })
})







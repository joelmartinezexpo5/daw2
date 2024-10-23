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
            let min = col * 10 + 1;
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
            let fila = generarNumeroAleatorio(0, 2);
            carton[fila][col] = null;
        }

        for (let fila = 0; fila < 3; ++fila) {
            let indiceCol = generarNumeroAleatorio(0, 8);
            let indiceFila = generarNumeroAleatorio(0, 2);
            if (carton[indiceFila][indiceCol] === null) {
                --fila;
            } else {
                carton[indiceFila][indiceCol] = null;
            }
        }

        console.log(carton);
        return carton;
    }

    function pintarCartones() {
        const cartonesJugadores = document.getElementById('cartonesJugadores');
        const cartonHumano = document.getElementById('cartonHumano');

        for (let c = 0; c < 2; ++c) {
            const tabla = document.createElement('table');
            tabla.setAttribute('border', '1');
            for (let i = 0; i < 3; i++) {
                const fila = document.createElement('tr');

                for (let j = 0; j < 9; j++) {
                    const celda = document.createElement('td');
                    celda.textContent = cartones[c][i][j];
                    fila.appendChild(celda);
                }
                tabla.appendChild(fila);
            }

            cartonesJugadores.appendChild(tabla);
        }

        const tabla = document.createElement('table');
        tabla.setAttribute('border', '1');

        for (let i = 0; i < 3; i++) {

            const fila = document.createElement('tr');

            for (let j = 0; j < 9; j++) {
                const celda = document.createElement('td');
                celda.textContent = cartones[2][i][j];
                fila.appendChild(celda);
            }

            tabla.appendChild(fila);
        }

        cartonHumano.appendChild(tabla);
    }

    function sacarBolas(){
        const listaBolas = document.getElementById('listaBolas');
        const parrafo = document.createElement('p')
        for(let bola=1;bola<=99;++bola){
            let bolas = [];
            let numero =generarNumeroAleatorio(1,99);
            bolas[bola] = numero;
            parrafo.textContent = bolas[bola];
        }
        listaBolas.appendChild(parrafo);
    }

    function inicializarJuego() {
        for (let i = 0; i < 3; ++i) {
            cartones.push(generarCartones());
        }
        pintarCartones();
        sacarBolas();
        console.log("Cartones generados:");
        console.log(cartones)
    }

    return {
        generarCartones,
        inicializarJuego,
        pintarCartones,
        sacarBolas
    };
})();

//$bingo.inicializarJuego();

window.addEventListener('load', function () {

    const comenzarBtn = document.getElementById('comenzarBtn');
    const cantarLineaBtn = document.getElementById('cantarLineaBtn');
    const cantarBingoBtn = document.getElementById('cantarBingoBtn');

    comenzarBtn.addEventListener('click', function () {
        $bingo.inicializarJuego();
    })
})







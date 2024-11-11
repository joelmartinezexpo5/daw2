'use strict'

function jugarDados(numeroLados) {

    function definirNumeroAleatorio() {
        let numeroAleatorio = 6
        while (numeroAleatorio > 5) {
            numeroAleatorio = parseInt(Math.random(10 * numeroLados) * 10);
        }
        return numeroAleatorio;
    }

    function tirarDados() {
        let resultados = [];
        for (let i = 0; i < numeroLados; ++i) {
            resultados[i] = definirNumeroAleatorio();
        }

        let tiradas = parseInt(prompt('Ingresa el numero de tiradas:'));

        let jugador1 = 0;
        let jugador2 = 0;

        console.log(resultados);

        while (tiradas > 0) {
            for (let j = 0; j < tiradas; ++j) {
                if (resultados[j] > resultados[j + 1]) {
                    alert('Victoria jugador1');
                    ++jugador1;
                    --tiradas;
                } else if (resultados[j] < resultados[j + 1]) {
                    alert('Victoria jugador2');
                    ++jugador2;
                    --tiradas;
                } else {
                    alert('Empate')
                    --tiradas;
                }
            }
        }


        let resultado = `Jugador1 | ${jugador1} - ${jugador2} | Jugador2`;
        return alert(resultado);
    }

    tirarDados();
}
let lados = parseInt(prompt('Ingresa el numero de lados:'));
jugarDados(lados);
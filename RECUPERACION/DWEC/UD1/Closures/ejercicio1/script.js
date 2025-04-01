function jugarDados(numeroLados) {
    function tirarDado() {
        return Math.floor(Math.random() * numeroLados) + 1;
    }
    return function () {
        return [tirarDado(), tirarDado()];
    };
}

const numeroLados = parseInt(prompt("Ingrese el número de lados de los dados:"));
const numeroTiradas = parseInt(prompt("Ingrese el número de tiradas:"));

const tirarDados = jugarDados(numeroLados);
let victoriasJugador = 0, victoriasMaquina = 0;

for (let i = 0; i < numeroTiradas; i++) {
    alert(`Tirada ${i + 1}. Presione aceptar para lanzar los dados.`);

    const [jugador1, jugador2] = tirarDados();
    const [maquina1, maquina2] = tirarDados();

    const sumaJugador = jugador1 + jugador2;
    const sumaMaquina = maquina1 + maquina2;

    alert(`Resultado:\nJugador: ${jugador1} + ${jugador2} = ${sumaJugador}\nMáquina: ${maquina1} + ${maquina2} = ${sumaMaquina}`);

    if (sumaJugador > sumaMaquina) victoriasJugador++;
    else if (sumaMaquina > sumaJugador) victoriasMaquina++;
}

alert(`Resultado final:\nJugador: ${victoriasJugador} victorias\nMáquina: ${victoriasMaquina} victorias`);

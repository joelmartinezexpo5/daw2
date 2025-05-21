// App.jsx
import React, { useState } from 'react';
import Tablero from './/components/Tablero';
import './estilos.css';

const combinacionesGanadoras = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [2, 4, 6],
];

function calcularGanador(casillas) {
  for (let combo of combinacionesGanadoras) {
    const [a, b, c] = combo;
    if (casillas[a] && casillas[a] === casillas[b] && casillas[a] === casillas[c]) {
      return casillas[a];
    }
  }
  return null;
}

export default function Juego() {
  const [casillas, setCasillas] = useState(Array(9).fill(null));
  const [xEmpieza, setXEmpieza] = useState(true);
  const [jugadorInicial, setJugadorInicial] = useState(true);

  const ganador = calcularGanador(casillas);
  const tableroLleno = casillas.every(Boolean);
  const estado = ganador
    ? `Ganador: ${ganador}`
    : tableroLleno
    ? 'Empate'
    : `Turno: ${xEmpieza ? 'X' : 'O'}`;

  function manejarClick(i) {
    if (casillas[i] || ganador) return;
    const nuevasCasillas = [...casillas];
    nuevasCasillas[i] = xEmpieza ? 'X' : 'O';
    setCasillas(nuevasCasillas);
    setXEmpieza(!xEmpieza);
  }

  function reiniciarJuego() {
    const nuevoInicio = !jugadorInicial;
    setJugadorInicial(nuevoInicio);
    setXEmpieza(nuevoInicio);
    setCasillas(Array(9).fill(null));
  }

  return (
    <div className="contenedor-juego">
      <h1>Tres en Raya</h1>
      <div className="estado">{estado}</div>
      <Tablero casillas={casillas} alClickear={manejarClick} />
      <button className="boton-reiniciar" onClick={reiniciarJuego}>
        Reiniciar Juego
      </button>
    </div>
  );
}
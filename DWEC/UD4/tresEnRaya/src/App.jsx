// src/App.jsx
import { useState } from 'react';

function Casilla({ valor, alHacerClick }) {
  return (
    <button className="casilla" onClick={alHacerClick}>
      {valor}
    </button>
  );
}

function Tablero() {
  const [casillas, setCasillas] = useState(Array(9).fill(null));
  const [esTurnoX, setEsTurnoX] = useState(true);

  function manejarClick(index) {
    if (casillas[index] || calcularGanador(casillas)) return;
    const nuevasCasillas = casillas.slice();
    nuevasCasillas[index] = esTurnoX ? 'X' : 'O';
    setCasillas(nuevasCasillas);
    setEsTurnoX(!esTurnoX);
  }

  function renderizarCasilla(i) {
    return <Casilla valor={casillas[i]} alHacerClick={() => manejarClick(i)} />;
  }

  const ganador = calcularGanador(casillas);
  const estado = ganador ? `Ganador: ${ganador}` : `Turno de: ${esTurnoX ? 'X' : 'O'}`;

  return (
    <div>
      <div className="estado">{estado}</div>
      <div className="fila-tablero">
        {renderizarCasilla(0)}{renderizarCasilla(1)}{renderizarCasilla(2)}
      </div>
      <div className="fila-tablero">
        {renderizarCasilla(3)}{renderizarCasilla(4)}{renderizarCasilla(5)}
      </div>
      <div className="fila-tablero">
        {renderizarCasilla(6)}{renderizarCasilla(7)}{renderizarCasilla(8)}
      </div>
      <button className="reiniciar" onClick={() => setCasillas(Array(9).fill(null))}>
        Reiniciar Juego
      </button>
    </div>
  );
}

function calcularGanador(casillas) {
  const lineasGanadoras = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8], 
    [0, 3, 6], [1, 4, 7], [2, 5, 8], 
    [0, 4, 8], [2, 4, 6]
  ];
  for (const [a, b, c] of lineasGanadoras) {
    if (casillas[a] && casillas[a] === casillas[b] && casillas[a] === casillas[c]) {
      return casillas[a];
    }
  }
  return null;
}

export default function App() {
  return <Tablero />;
}

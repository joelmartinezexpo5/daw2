import React from 'react';
import Casilla from './Casilla';

export default function Tablero({ casillas, alClickear }) {
  return (
    <div className="tablero">
      {casillas.map((valor, i) => (
        <Casilla key={i} valor={valor} alClickear={() => alClickear(i)} />
      ))}
    </div>
  );
}

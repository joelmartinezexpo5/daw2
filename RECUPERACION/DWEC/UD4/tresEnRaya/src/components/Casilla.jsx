import React from 'react';

export default function Casilla({ valor, alClickear }) {
  return (
    <button className="casilla" onClick={alClickear}>
      {valor}
    </button>
  );
}

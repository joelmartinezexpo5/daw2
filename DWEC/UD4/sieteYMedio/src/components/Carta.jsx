// Carta.jsx
import React from 'react';

const Carta = ({ carta }) => {
  if (!carta) return null;
  
  return (
    <div className="carta">
      <p>{carta.numero} de {carta.palo}</p>
    </div>
  );
};

export default Carta;

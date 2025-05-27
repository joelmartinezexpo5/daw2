import React from "react";

function Carta({ carta }) {
    
    if(!carta) return null;

    return (
        <div className="carta">
            <p>{carta.numero} de {carta.palo}</p>
        </div>
    );
}
export default Carta;
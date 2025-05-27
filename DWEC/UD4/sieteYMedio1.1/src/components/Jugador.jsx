import React from "react";
import Carta from "./Carta";
import { sumarCartas } from "../core/baraja";

function Jugador({ nombre, mano }) {
    return (
        <div className="jugador">
            <h2>{nombre}</h2>
            <div>
                {mano.map(carta => (
                    <Carta key={carta.id} carta={carta} />
                ))}
            </div>
            <p>Total: {sumarCartas(mano)}</p>
        </div>
    );
}
export default Jugador;
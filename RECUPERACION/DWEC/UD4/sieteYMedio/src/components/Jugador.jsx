import { sumarCartas } from "../../core/baraja";
import Carta from "./Carta";

function Jugador({nombre, mano}){
    return(
        <>
            <div className="jugador">
                <h1>{nombre}</h1>
                <div>
                    {mano.map(carta => (
                        <Carta key={carta.id} carta={carta}/>
                    ))}
                </div>
                <p>Total: {sumarCartas(mano)}</p>
            </div>
        </>
    );
}
export default Jugador;
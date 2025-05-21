import { useState } from "react";
import Casilla from "./Casilla";

function Tablero(){
    const [valor, setValor] = useState("X")
    const [turno, setTurno] = useState(1);

    const responderAPadre = (caracter) => {
        setValor(valor === "X" ? "O":"X");
        setTurno(turno + 1);
    };

    return(
        <>
            <h1>Turno {turno}</h1>
            <div className="tablero">
                <div>
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                </div>
                <div>
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                </div>
                <div>
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                    <Casilla valor={valor} comunicarPadre={responderAPadre} />
                </div>
                
            </div>        
        </>
    )
}
export default Tablero;
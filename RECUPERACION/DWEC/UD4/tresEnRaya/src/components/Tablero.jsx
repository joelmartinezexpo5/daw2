import { useState } from "react";
import Casilla from "./Casilla";

function Tablero(){
    const [tablero, setTablero] = useState(Array(9));
    const [valor, setValor] = useState("X");
    const [turno, setTurno] = useState(1);
    const [ganador, setGanador] = useState(null);

    const responderAPadre = (indice) => {

        const nuevoTablero = [...tablero];
        nuevoTablero[indice] = valor;
        setTablero(nuevoTablero);

        if(comprobarGanador(nuevoTablero, valor)){
            setGanador(valor)
        } else{
            setValor(valor === "X" ? "O":"X");
            setTurno(turno + 1);
        }
    };

    const comprobarGanador = (tablero, jugador) => {
        const lineas =[
            [0,1,2],
            [3,4,5],
            [6,7,8],
            [0,3,6],
            [1,4,7],
            [2,5,8],
            [0,4,8],
            [2,4,6]
        ];

        for(let i=0;i< lineas.length; i++){
            const[a,b,c] = lineas[i];
            if(tablero[a] === jugador && tablero[b] === jugador && tablero[c] ===jugador){
                return true;
            }
        }
        return false
    }



    return(
        <>
            <h1>{ganador ? `Ganador: ${ganador}`:`Turno: ${turno} - Juega: ${valor}`}</h1>
            <div className="tablero">
                <div>
                    <Casilla valor={tablero[0]} indice={0} comunicarPadre={responderAPadre} />
                    <Casilla valor={tablero[1]} indice={1} comunicarPadre={responderAPadre} />
                    <Casilla valor={tablero[2]} indice={2} comunicarPadre={responderAPadre} />
                </div>
                <div>
                    <Casilla valor={tablero[3]} indice={3} comunicarPadre={responderAPadre} />
                    <Casilla valor={tablero[4]} indice={4} comunicarPadre={responderAPadre} />
                    <Casilla valor={tablero[5]} indice={5} comunicarPadre={responderAPadre} />
                </div>
                <div>
                    <Casilla valor={tablero[6]} indice={6} comunicarPadre={responderAPadre} />
                    <Casilla valor={tablero[7]} indice={7} comunicarPadre={responderAPadre} />
                    <Casilla valor={tablero[8]} indice={8} comunicarPadre={responderAPadre} />
                </div>
                
            </div>        
        </>
    )
}
export default Tablero;
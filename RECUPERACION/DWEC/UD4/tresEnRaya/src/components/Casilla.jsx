import { useState } from "react";

function Casilla({valor, comunicarPadre}){
    const [contenido, setContenido] = useState("");

    const handleClick = () => {
        if(contenido === ""){
            setContenido(valor);
            comunicarPadre();
        }
    }

    return (
        <>
        <button className="casilla" style={{
            border: `2px solid black`,
            height: `60px`,
            width: `60px`,
            }} onClick={handleClick}>{contenido}</button>
        </>
    );
}
export default Casilla;
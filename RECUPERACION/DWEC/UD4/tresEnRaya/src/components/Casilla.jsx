import { useState } from "react";

function Casilla({ valor, comunicarPadre, indice }) {

    const handleClick = () => {
        comunicarPadre(indice);
    }

    return (
        <>
            <button type="button" className="casilla" style={{
                border: `2px solid black`,
                height: `100px`,
                width: `100px`,
                margin: `5px`,
                verticalAlign: `top`,
            }} onClick={handleClick}>{valor}</button>
        </>
    );
}
export default Casilla;
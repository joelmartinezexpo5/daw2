// import Hijo from "./Hijo";
// function Padre() {
//     return (
//         <>
//             <h1>Padre</h1>
//             <Hijo mensaje="Saludo desde el padre" />
//         </>
//     );
// }
// export default Padre;

import { useState } from "react";
import Hijo from "./Hijo";
function Padre() {
    const [respuesta, setRespuesta] = useState("Esperando contestación");
    const responderAPadre = (contestacion) => {
        setRespuesta(contestacion);
    };
    return (
        <>
            <h1>Padre</h1>
            <Hijo mensaje="Programa un poco" comunicarPadre={responderAPadre}
            />
            <p>Respuesta hijo: {respuesta}</p>
        </>
    );
}
export default Padre;
import { useState } from "react";

function AdministracionPage(){
    const [tienePermisos, setTienePermisos] = useState(false);

    if(!tienePermisos){
        return <Navigate to="/" />
    }


    return(
        <>
            <h1>Pagina con permisos</h1>
        </>
    )
}
export default AdministracionPage;
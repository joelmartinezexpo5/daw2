import { useContext, useState } from "react";
import { SeguridadContext } from "../contexts/SeguridadProvider";
import { Navigate } from "react-router-dom";

function AdministracionPage(){
    //const [tienePermisos, setTienePermisos] = useState(false);

    const { datos } = useContext(SeguridadContext);

    if(!datos.tienePermisos){
        return <Navigate to="/" />;
    }


    return(
        <>
            <h1>Pagina con permisos</h1>
        </>
    )
}
export default AdministracionPage;
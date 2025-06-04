import { useNavigate, useParams } from "react-router-dom";

function PropiedadesExpediente(){
    const { id } = useParams();
    const navegar = useNavigate();
    

    return(
        <>
            <h1>Propiedades Expediente</h1>
        </>
    )
}

export default PropiedadesExpediente;
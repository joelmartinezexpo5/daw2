import { useEffect, useState } from "react";
import datos from "../services/datos";

function Usuarios(){
    const [usuarios, setUsuarios] = useState([]);

    useEffect(() => {
        setUsuarios(datos.usuarios);
    });



    return(
        <>
            <div>
                <h2>Listado de Usuarios</h2>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        {usuarios.map((usuario) => (
                            <tr>
                                <td>{usuario.id}</td>
                                <td>{usuario.username}</td>
                                <td>{usuario.password}</td>
                                <td>{usuario.tipo}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    )
}
export default Usuarios;
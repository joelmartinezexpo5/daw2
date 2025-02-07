import { useEffect, useState } from "react";
import datos from "../services/datos";

function Usuarios() {
    const [usuarios, setUsuarios] = useState([]);

    useEffect(() => {
        setUsuarios(datos.usuarios);
    });



    return (
        <>
            <div className="container mt-5">
                <h2 className="text-center text-primary mb-4">Gestión de Pacientes</h2>
                <table className="table table-striped table-hover">
                    <thead className="table-primary">
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
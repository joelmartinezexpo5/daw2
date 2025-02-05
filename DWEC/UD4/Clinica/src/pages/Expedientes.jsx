import { useEffect, useState } from "react";
import datos from "../services/datos";

function Expedientes() {
    const [expedientes, setExpedientes] = useState([]);

    useEffect(() => {
        setExpedientes(datos.expedientes);
    })

    return (
        <>
            <div>
                <h2>Listado de expedientes</h2>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Seguro Medico</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        {expedientes.map((exp) => {
                            const paciente = datos.pacientes.find(p => p.id === exp.pacienteId);
                            return (
                                <tr key={exp.id}>
                                    <td>{exp.id}</td>
                                    <td>{paciente.nombre}</td>
                                    <td>{exp.fechaApertura}</td>
                                    <td>{exp.antecedentes}</td>
                                    <td>{exp.diagnosticos}</td>
                                    <td>{exp.tratamientos}</td>
                                    <td>{exp.observaciones}</td>
                                </tr>
                            );
                        })}
                    </tbody>
                </table>
            </div>
        </>
    )
}
export default Expedientes;
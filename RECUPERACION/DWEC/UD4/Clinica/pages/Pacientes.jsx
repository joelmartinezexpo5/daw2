import { useEffect, useState } from "react";
import $negocio from "../core/negocio";

function Pacientes() {
    const [pacientes, setPacientes] = useState([]);
    const [filtro, setFiltro] = useState("");
    const [paginaActual, setPaginaActual] = useState(1);
    const pacientesPorPagina = 10;

    useEffect(() => {
        cargarPacientes();
    }, [])

    async function cargarPacientes() {
        const datos = await $negocio.obtenerPacientes(filtro);
        setPacientes(datos);
    }

    return (
        <>
            <h1>Pacientes</h1>

            <table border={1}>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Fecha Nacimiento</th>
                        <th>Sexo</th>
                        <th>Direccion</th>
                        <th>Seguro Medico</th>
                    </tr>
                </thead>
                <tbody>
                    {pacientes.map(paciente => (
                        <tr key={paciente.id}>
                            <td>{paciente.id}</td>
                            <td>{paciente.nombre}</td>
                            <td>{paciente.dni}</td>
                            <td>{paciente.email}</td>
                            <td>{paciente.telefono}</td>
                            <td>{paciente.fechaNacimiento}</td>
                            <td>{paciente.sexo}</td>
                            <td>{paciente.direccion}</td>
                            <td>{paciente.seguroMedico}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    )
}

export default Pacientes;
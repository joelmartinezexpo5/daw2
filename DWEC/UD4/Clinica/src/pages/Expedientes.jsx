import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import datos from "../services/datos";

function Expedientes() {
    const [expedientes, setExpedientes] = useState([]);
    const [filtro, setFiltro] = useState("");
    const [expedientesFiltrados, setExpedientesFiltrados] = useState([]);
    const [paginaActual, setPaginaActual] = useState(1);
    const expedientesPorPagina = 10;

    useEffect(() => {
        setExpedientes(datos.expedientes);
        setExpedientesFiltrados(datos.expedientes);
    }, []);

    const handleBuscar = (event) => {
        const texto = event.target.value;
        setFiltro(texto);
        setPaginaActual(1);

        const filtrados = datos.expedientes.filter(exp => {
            const paciente = datos.pacientes.find(p => p.id === exp.pacienteId);
            return paciente.nombre.toLowerCase().includes(texto);
        })
        setExpedientesFiltrados(filtrados);
    }

    //Paginacion
    const indexUltimo = paginaActual * expedientesPorPagina;
    const indexPrimero = indexUltimo - expedientesPorPagina;
    const expedientesActuales = expedientesFiltrados.slice(indexPrimero, indexUltimo);
    const totalPaginas = Math.ceil(expedientesFiltrados.length / expedientesPorPagina);


    return (
        <>
            <div className="container mt-5">
                <h2 className="text-center text-primary mb-4">Gestión de Expedientes</h2>
                {/*Buscador*/}
                <div className="mb-4 d-flex justify-content-between">
                    <input
                        type="text"
                        className="form-control w-50"
                        placeholder="Buscar paciente..."
                        value={filtro}
                        onChange={handleBuscar}
                    />
                </div>
                <table className="table table-striped table-hover">
                    <thead className="table-primary">
                        <tr>
                            <th>Paciente</th>
                            <th>Seguro Medico</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {expedientesActuales.map((exp) => {
                            const paciente = datos.pacientes.find(p => p.id === exp.pacienteId);
                            return (
                                <tr key={exp.id}>
                                    <td>{paciente.nombre}</td>
                                    <td>{paciente.seguroMedico}</td>
                                    <td>{paciente.telefono}</td>
                                    <td>
                                        <Link to={`/expedientes/${paciente.id}`} className="btn btn-warning btn-sm me-2">
                                            Ver Expediente
                                        </Link>
                                    </td>
                                </tr>
                            );
                        })}
                    </tbody>
                </table>

                {/* Paginacion */}
                <div className="d-flex justify-content-center mt-4">
                    <button
                        className="btn btn-primary mx-2"
                        disabled={paginaActual === 1}
                        onClick={() => setPaginaActual(paginaActual - 1)}
                    >
                        ◀ Anterior
                    </button>
                    <span className="align-self-center">
                        Página {paginaActual} de {totalPaginas}
                    </span>
                    <button
                        className="btn btn-primary mx-2"
                        disabled={paginaActual === totalPaginas}
                        onClick={() => setPaginaActual(paginaActual + 1)}
                    >
                        Siguiente ▶
                    </button>
                </div>
            </div>
        </>
    )
}
export default Expedientes;
import { useEffect, useState } from "react";
import datos from "../core/datos";
import { Link } from "react-router-dom";

function Expedientes() {
    const [expedientes, setExpedientes] = useState([]);
    const [filtro, setFiltro] = useState('');
    const [expedientesFiltrados, setExpedientesFiltrados] = useState([]);
    const [paginaActual, setPaginaActual] = useState(1);
    const expedientesPorPagina = 10;

    useEffect(() => {
        setExpedientes(datos.expedientes);
        setExpedientesFiltrados(datos.expedientes);
    }, [])

    function handleBuscar(evento) {
        const texto = evento.target.value.toLowerCase();
        setFiltro(texto);
        setPaginaActual(1);

        const expedientesFiltrados = datos.expedientes.filter(expediente => {
            const paciente = datos.pacientes.find(p => p.id === expediente.pacienteId);
            return paciente && paciente.nombre.toLowerCase().includes(texto);
        });

        setExpedientesFiltrados(expedientesFiltrados);
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
                {/* Lista de Pacientes */}
                <div className="table-responsive">
                    {/* Encabezados */}
                    <div className="row bg-primary text-white p-2 mx-0">
                        <div className="col">Paciente</div>
                        <div className="col">Telefono</div>
                        <div className="col">Seguro Medico</div>
                        <div className="col">Acciones</div>
                    </div>

                    {/* Filas de datos */}
                    {expedientesActuales.map((expediente) => {
                        const paciente = datos.pacientes.find(p => p.id === expediente.pacienteId);
                        return paciente && (
                            <div key={expediente.id} className="row border-bottom p-2 mx-0 align-items-center hover-bg-light">
                                <div className="col">{paciente.nombre}</div>
                                <div className="col">{paciente.telefono}</div>
                                <div className="col">{paciente.seguroMedico}</div>
                                <div className="col">
                                    <Link to={`/expediente/${paciente.id}`} className="btn btn-warning btn-sm me-2">
                                        Ver Expediente
                                    </Link>
                                </div>
                            </div>
                        );
                    })}
                </div>

                {/* Paginación */}
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
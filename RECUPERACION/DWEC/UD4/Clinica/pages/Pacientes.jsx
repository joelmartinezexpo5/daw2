import { useEffect, useState } from "react";
import $negocio from "../core/negocio";
import { Link } from "react-router-dom";

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

  const handleBuscar = async (event) => {
    setFiltro(event.target.value);
    cargarPacientes();
  };

  const handleEliminar = async (id) => {
    if (window.confirm("¿Estás seguro de eliminar este paciente?")) {
      await $negocio.eliminarPaciente(id);
      cargarPacientes();
    }
  };

  // Paginación
  const indexUltimoPaciente = paginaActual * pacientesPorPagina;
  const indexPrimerPaciente = indexUltimoPaciente - pacientesPorPagina;
  const pacientesActuales = pacientes.slice(indexPrimerPaciente, indexUltimoPaciente);
  const totalPaginas = Math.ceil(pacientes.length / pacientesPorPagina);

  return (
    <div className="container mt-5">
      <h2 className="text-center text-primary mb-4">Gestión de Pacientes</h2>

      {/* Buscador y Botón para Crear Paciente */}
      <div className="mb-4 d-flex justify-content-between">
        <input
          type="text"
          className="form-control w-50"
          placeholder="Buscar paciente..."
          value={filtro}
          onChange={handleBuscar}
        />
        <Link to="/pacientes/crear" className="btn btn-success">
          Crear Paciente
        </Link>
      </div>

      {/* Lista de Pacientes */}
      <div className="table-responsive">
        {/* Encabezados */}
        <div className="row bg-primary text-white p-2 mx-0">
          <div className="col">ID</div>
          <div className="col">Nombre</div>
          <div className="col">DNI</div>
          <div className="col">Email</div>
          <div className="col">Teléfono</div>
          <div className="col">Acciones</div>
        </div>

        {/* Filas de datos */}
        {pacientesActuales.map((paciente) => (
          <div key={paciente.id} className="row border-bottom p-2 mx-0 align-items-center hover-bg-light">
            <div className="col">{paciente.id}</div>
            <div className="col">{paciente.nombre}</div>
            <div className="col">{paciente.dni}</div>
            <div className="col">{paciente.email}</div>
            <div className="col">{paciente.telefono}</div>
            <div className="col">
              <Link to={`/pacientes/editar/${paciente.id}`} className="btn btn-warning btn-sm me-2">
                Editar
              </Link>
              <button onClick={() => handleEliminar(paciente.id)} className="btn btn-danger btn-sm">
                Eliminar
              </button>
            </div>
          </div>
        ))}
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
  );
};

export default Pacientes;
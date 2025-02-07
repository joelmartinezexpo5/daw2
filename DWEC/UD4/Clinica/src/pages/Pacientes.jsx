import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import $negocio from "../services/negocio";

const Pacientes = () => {
  const [pacientes, setPacientes] = useState([]);
  const [filtro, setFiltro] = useState("");
  const [paginaActual, setPaginaActual] = useState(1);
  const pacientesPorPagina = 10; // Mostrar 10 pacientes por página

  useEffect(() => {
    cargarPacientes();
  }, []);

  const cargarPacientes = async () => {
    const datos = await $negocio.obtenerPacientes(filtro);
    setPacientes(datos);
    setPaginaActual(1); // Reiniciar a la primera página al buscar
  };

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
        <Link to="/pacientes/nuevo" className="btn btn-success">
          Crear Paciente
        </Link>
      </div>

      {/* Tabla de Pacientes */}
      <table className="table table-striped table-hover">
        <thead className="table-primary">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          {pacientesActuales.map((paciente) => (
            <tr key={paciente.id}>
              <td>{paciente.id}</td>
              <td>{paciente.nombre}</td>
              <td>{paciente.dni}</td>
              <td>{paciente.email}</td>
              <td>{paciente.telefono}</td>
              <td>
                <Link to={`/pacientes/editar/${paciente.id}`} className="btn btn-warning btn-sm me-2">
                  Editar
                </Link>
                <button onClick={() => handleEliminar(paciente.id)} className="btn btn-danger btn-sm">
                  Eliminar
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

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

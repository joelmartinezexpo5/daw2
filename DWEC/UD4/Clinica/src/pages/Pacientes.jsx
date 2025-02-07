import { useState, useEffect } from "react";
import $negocio from "../services/negocio";

const Pacientes = () => {
  const [pacientes, setPacientes] = useState([]);
  const [filtro, setFiltro] = useState("");
  const [paginaActual, setPaginaActual] = useState(1);
  const [nuevoPaciente, setNuevoPaciente] = useState({
    nombre: "",
    dni: "",
    email: "",
    telefono: "",
    fechaNacimiento: "",
    sexo: "",
    direccion: "",
    seguroMedico: "",
  });
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

  const handleCrearPaciente = async (event) => {
    event.preventDefault();
    if (!nuevoPaciente.nombre || !nuevoPaciente.dni) {
      alert("El nombre y el DNI son obligatorios");
      return;
    }
    await $negocio.crearPaciente(nuevoPaciente);
    setNuevoPaciente({
      nombre: "",
      dni: "",
      email: "",
      telefono: "",
      fechaNacimiento: "",
      sexo: "",
      direccion: "",
      seguroMedico: "",
    });
    cargarPacientes();
  };

  // Paginación - Calcular índices
  const indexUltimoPaciente = paginaActual * pacientesPorPagina;
  const indexPrimerPaciente = indexUltimoPaciente - pacientesPorPagina;
  const pacientesActuales = pacientes.slice(indexPrimerPaciente, indexUltimoPaciente);

  // Control de botones de paginación
  const totalPaginas = Math.ceil(pacientes.length / pacientesPorPagina);

  return (
    <div className="container mt-5">
      <h2 className="text-center text-primary mb-4">Gestión de Pacientes</h2>

      {/* Buscador */}
      <div className="mb-4 d-flex justify-content-center">
        <input
          type="text"
          className="form-control w-50"
          placeholder="Buscar paciente..."
          value={filtro}
          onChange={handleBuscar}
        />
        {/*Boton Modal */}
        <button type="button" className="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Crear Pacientes
        </button>
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
            <th>Fecha Nacimiento</th>
            <th>Sexo</th>
            <th>Dirección</th>
            <th>Seguro Médico</th>
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
              <td>{paciente.fechaNacimiento}</td>
              <td>{paciente.sexo}</td>
              <td>{paciente.direccion}</td>
              <td>{paciente.seguroMedico}</td>
              <td>
                <button
                  onClick={() => handleEliminar(paciente.id)}
                  className="btn btn-danger btn-sm"
                >
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
      {/* Formulario para Agregar Paciente */}
      <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div className="modal-dialog">
          <div className="modal-content">
            <div className="modal-header">
              <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div className="modal-body"></div>
            <h3 className="text-center mb-4 text-success">Agregar Paciente</h3>
            <form onSubmit={handleCrearPaciente}>
              <div className="mb-3">
                <input
                  type="text" className="form-control" placeholder="Nombre" value={nuevoPaciente.nombre} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, nombre: e.target.value })} required
                />
              </div>
              <div className="mb-3">
                <input 
                  type="text" className="form-control" placeholder="DNI" value={nuevoPaciente.dni} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, dni: e.target.value })} required
                />
              </div>
              <div className="mb-3">
                <input
                  type="email" className="form-control" placeholder="Email" value={nuevoPaciente.email} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, email: e.target.value })}
                />
              </div>
              <div className="mb-3">
                <input
                  type="text" className="form-control" placeholder="Teléfono" value={nuevoPaciente.telefono} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, telefono: e.target.value })}
                />
              </div>
              <div className="mb-3">
                <input
                  type="date" className="form-control" placeholder="Fecha de Nacimiento" value={nuevoPaciente.fechaNacimiento} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, fechaNacimiento: e.target.value })}
                />
              </div>
              <div className="mb-3">
                <select
                  className="form-control" value={nuevoPaciente.sexo} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, sexo: e.target.value })}
                >
                  <option value="">Seleccione Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
              <div className="mb-3">
                <input
                  type="text" className="form-control" placeholder="Dirección" value={nuevoPaciente.direccion} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, direccion: e.target.value })}
                />
              </div>
              <div className="mb-3">
                <input
                  type="text" className="form-control" placeholder="Seguro Médico" value={nuevoPaciente.seguroMedico} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, seguroMedico: e.target.value })}
                />
              </div>
              <div className="d-flex justify-content-center">
                <button type="submit" className="btn btn-success">
                  Crear Paciente
                </button>
              </div>
            </form>
          </div>
          <div className="modal-footer">
            <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" className="btn btn-primary">Crear Paciente</button>
          </div>
        </div>
      </div>
    </div>

  );
};
export default Pacientes;

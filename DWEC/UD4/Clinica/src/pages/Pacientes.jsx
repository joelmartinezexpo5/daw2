import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import $negocio from "../services/negocio";
import datos from "../services/datos";
const Pacientes = () => {
  const [pacientes, setPacientes] = useState([]);
  const [filtro, setFiltro] = useState("");
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

  useEffect(() => {
    cargarPacientes();
  }, []);

  const cargarPacientes = async () => {
    const datos = await $negocio.obtenerPacientes(filtro);
    setPacientes(datos);
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
          {pacientes.map((paciente) => (
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
                  ❌ Eliminar
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {/* Formulario para Agregar Paciente */}
      <div className="card shadow-lg p-4 mt-5">
        <h3 className="text-center mb-4 text-success">Agregar Paciente</h3>
        <form onSubmit={handleCrearPaciente}>
          <div className="mb-3">
            <input
              type="text"
              className="form-control"
              placeholder="Nombre"
              value={nuevoPaciente.nombre}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, nombre: e.target.value })}
              required
            />
          </div>
          <div className="mb-3">
            <input
              type="text"
              className="form-control"
              placeholder="DNI"
              value={nuevoPaciente.dni}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, dni: e.target.value })}
              required
            />
          </div>
          <div className="mb-3">
            <input
              type="email"
              className="form-control"
              placeholder="Email"
              value={nuevoPaciente.email}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, email: e.target.value })}
            />
          </div>
          <div className="mb-3">
            <input
              type="text"
              className="form-control"
              placeholder="Teléfono"
              value={nuevoPaciente.telefono}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, telefono: e.target.value })}
            />
          </div>
          <div className="mb-3">
            <input
              type="date"
              className="form-control"
              placeholder="Fecha de Nacimiento"
              value={nuevoPaciente.fechaNacimiento}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, fechaNacimiento: e.target.value })}
            />
          </div>
          <div className="mb-3">
            <select
              className="form-control"
              value={nuevoPaciente.sexo}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, sexo: e.target.value })}
            >
              <option value="">Seleccione Sexo</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div className="mb-3">
            <input
              type="text"
              className="form-control"
              placeholder="Dirección"
              value={nuevoPaciente.direccion}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, direccion: e.target.value })}
            />
          </div>
          <div className="mb-3">
            <input
              type="text"
              className="form-control"
              placeholder="Seguro Médico"
              value={nuevoPaciente.seguroMedico}
              onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, seguroMedico: e.target.value })}
            />
          </div>
          <div className="d-flex justify-content-center">
            <button type="submit" className="btn btn-success">
              ➕ Crear Paciente
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default Pacientes;

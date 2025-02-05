import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import $negocio from "../services/negocio";

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
    <div>
      <h2>Gestión de Pacientes</h2>

      {/*Buscador */}
      <input
        type="text"
        placeholder="Buscar paciente..."
        value={filtro}
        onChange={handleBuscar}
      />

      {/*Tabla de Pacientes */}
      <table border="1">
        <thead>
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
                <button onClick={() => handleEliminar(paciente.id)}>❌ Eliminar</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {/*Formulario para Agregar Paciente */}
      <h3>Agregar Paciente</h3>
      <form onSubmit={handleCrearPaciente}>
        <input type="text" placeholder="Nombre" value={nuevoPaciente.nombre} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, nombre: e.target.value })} required />
        <input type="text" placeholder="DNI" value={nuevoPaciente.dni} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, dni: e.target.value })} required />
        <input type="email" placeholder="Email" value={nuevoPaciente.email} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, email: e.target.value })} />
        <input type="text" placeholder="Teléfono" value={nuevoPaciente.telefono} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, telefono: e.target.value })} />
        <input type="date" placeholder="Fecha de Nacimiento" value={nuevoPaciente.fechaNacimiento} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, fechaNacimiento: e.target.value })} />
        <select value={nuevoPaciente.sexo} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, sexo: e.target.value })}>
          <option value="">Seleccione Sexo</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
          <option value="Otro">Otro</option>
        </select>
        <input type="text" placeholder="Dirección" value={nuevoPaciente.direccion} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, direccion: e.target.value })} />
        <input type="text" placeholder="Seguro Médico" value={nuevoPaciente.seguroMedico} onChange={(e) => setNuevoPaciente({ ...nuevoPaciente, seguroMedico: e.target.value })} />
        <button type="submit">➕ Crear Paciente</button>
      </form>
    </div>
  );
};

export default Pacientes;

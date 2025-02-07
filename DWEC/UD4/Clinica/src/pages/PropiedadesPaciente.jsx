import { useState, useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";
import $negocio from "../services/negocio";

const PropiedadesPaciente = () => {
  const { id } = useParams(); // Obtiene el ID si es edición
  const navigate = useNavigate();
  const [paciente, setPaciente] = useState({
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
    if (id) {
      cargarPaciente();
    }
  }, [id]);

  const cargarPaciente = async () => {
    const pacienteEncontrado = await $negocio.obtenerPaciente(id);
    if (pacienteEncontrado) {
      setPaciente(pacienteEncontrado);
    }
  };

  const handleChange = (e) => {
    setPaciente({ ...paciente, [e.target.name]: e.target.value });
  };

  const handleGuardar = async (e) => {
    e.preventDefault();
    if (id) {
      await $negocio.actualizarPaciente(id, paciente);
    } else {
      await $negocio.crearPaciente(paciente);
    }
    navigate("/pacientes"); // Redirigir a la lista de pacientes
  };

  return (
    <div className="container mt-5">
      <h2 className="text-center text-primary mb-4">{id ? "Editar Paciente" : "Crear Paciente"}</h2>
      <form onSubmit={handleGuardar}>
        <div className="mb-3">
          <label className="form-label">Nombre</label>
          <input type="text" className="form-control" name="nombre" value={paciente.nombre} onChange={handleChange} required />
        </div>
        <div className="mb-3">
          <label className="form-label">DNI</label>
          <input type="text" className="form-control" name="dni" value={paciente.dni} onChange={handleChange} required />
        </div>
        <div className="mb-3">
          <label className="form-label">Email</label>
          <input type="email" className="form-control" name="email" value={paciente.email} onChange={handleChange} />
        </div>
        <div className="mb-3">
          <label className="form-label">Teléfono</label>
          <input type="text" className="form-control" name="telefono" value={paciente.telefono} onChange={handleChange} />
        </div>
        <div className="mb-3">
          <label className="form-label">Fecha de Nacimiento</label>
          <input type="date" className="form-control" name="fechaNacimiento" value={paciente.fechaNacimiento} onChange={handleChange} />
        </div>
        <div className="mb-3">
          <label className="form-label">Seguro Médico</label>
          <input type="text" className="form-control" name="seguroMedico" value={paciente.seguroMedico} onChange={handleChange} />
        </div>
        <div className="d-flex justify-content-center">
          <button type="submit" className="btn btn-success">Guardar</button>
          <button type="button" className="btn btn-secondary ms-3" onClick={() => navigate("/pacientes")}>Cancelar</button>
        </div>
      </form>
    </div>
  );
};

export default PropiedadesPaciente;

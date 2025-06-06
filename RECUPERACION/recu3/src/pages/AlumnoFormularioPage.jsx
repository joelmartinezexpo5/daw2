import { useEffect } from "react";
import { useNavigate, useParams } from "react-router-dom";
import {
  crearAlumno,
  obtenerAlumno,
  actualizarAlumno,
} from "../services/alumnosService";

const AlumnoFormularioPage = () => {
  const { id } = useParams();
  const navigate = useNavigate();

  useEffect(() => {
    if (id) {
      obtenerAlumno(id).then((alumno) => {
        document.getElementById("nombre").value = alumno.nombre;
        document.getElementById("apellidos").value = alumno.apellidos;
        document.getElementById("email").value = alumno.email;
        document.getElementById("ciclo").value = alumno.ciclo;
        document.getElementById("telefono").value = alumno.telefono;
      });
    }
  }, [id]);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const datos = {
      nombre: document.getElementById("nombre").value,
      apellidos: document.getElementById("apellidos").value,
      email: document.getElementById("email").value,
      ciclo: document.getElementById("ciclo").value,
      telefono: document.getElementById("telefono").value,
    };

    try {
      if (id) {
        await actualizarAlumno({ ...datos, alumnoId: parseInt(id) });
      } else {
        await crearAlumno(datos);
      }
      navigate("/alumnos");
    } catch (error) {
      console.error("Error al guardar alumno:", error);
    }
  };

  return (
    <div>
      <h2>{id ? "Editar Alumno" : "Nuevo Alumno"}</h2>
      <form onSubmit={handleSubmit}>
        <label>Nombre: <input id="nombre" name="nombre" required /></label><br />
        <label>Apellidos: <input id="apellidos" name="apellidos" required /></label><br />
        <label>Email: <input id="email" name="email" type="email" required /></label><br />
        <label>Ciclo: <input id="ciclo" name="ciclo" required /></label><br />
        <label>Teléfono: <input id="telefono" name="telefono" required /></label><br />
        <button type="submit">{id ? "Guardar Cambios" : "Crear Alumno"}</button>
      </form>
    </div>
  );
};

export default AlumnoFormularioPage;

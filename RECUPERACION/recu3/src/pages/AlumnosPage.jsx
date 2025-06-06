// src/pages/AlumnosPage.jsx
import { useContext } from "react";
import { AlumnosContext } from "../context/AlumnosContext";
import { useNavigate } from "react-router-dom";
import { eliminarAlumno } from "../services/alumnosService";

const AlumnosPage = () => {
  const { alumnos, llenarAlumnos } = useContext(AlumnosContext);
  const navigate = useNavigate();

  const handleEditar = (id) => {
    navigate(`/alumnos/editar/${id}`);
  };

  const handleEliminar = async (id) => {
    if (confirm("¿Eliminar este alumno?")) {
      await eliminarAlumno(id);
      await llenarAlumnos();
    }
  };

  const handleCrear = () => {
    navigate("/alumnos/nuevo");
  };

  return (
    <div>
      <h2>Listado de Alumnos</h2>
      <button onClick={handleCrear}>Nuevo Alumno</button>
      <div className="tabla">
        <div className="linea cabecera">
          <div>Nombre</div>
          <div>Apellido</div>
          <div>Email</div>
          <div>Ciclo</div>
          <div>Teléfono</div>
          <div>Acciones</div>
        </div>
        {alumnos.map((alumno) => (
          <div key={alumno.alumnoId} className="linea">
            <div>{alumno.nombre}</div>
            <div>{alumno.apellidos}</div>
            <div>{alumno.email}</div>
            <div>{alumno.ciclo}</div>
            <div>{alumno.telefono}</div>
            <div>
              <button onClick={() => handleEditar(alumno.alumnoId)}>Editar</button>
              <button onClick={() => handleEliminar(alumno.alumnoId)}>Eliminar</button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default AlumnosPage;

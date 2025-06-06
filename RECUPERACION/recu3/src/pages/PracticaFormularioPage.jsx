import { useEffect, useState } from "react";
import { useParams, useNavigate } from "react-router-dom";
import {
  obtenerPractica,
  crearPractica,
  actualizarPractica,
} from "../services/practicasService";
import { obtenerAlumnos } from "../services/alumnosService";
import { obtenerEmpresas } from "../services/empresasService";

const PracticaFormularioPage = () => {
  const { id } = useParams();
  const navigate = useNavigate();

  const [alumnos, setAlumnos] = useState([]);
  const [empresas, setEmpresas] = useState([]);

  useEffect(() => {
    obtenerAlumnos().then(setAlumnos);
    obtenerEmpresas().then(setEmpresas);

    if (id) {
      obtenerPractica(id).then((practica) => {
        document.getElementById("alumnoId").value = practica.alumnoId;
        document.getElementById("empresaId").value = practica.empresaId;
        document.getElementById("fechaInicio").value = practica.fechaInicio;
        document.getElementById("fechaFin").value = practica.fechaFin;
      });
    }
  }, [id]);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const datos = {
      alumnoId: parseInt(document.getElementById("alumnoId").value),
      empresaId: parseInt(document.getElementById("empresaId").value),
      fechaInicio: document.getElementById("fechaInicio").value,
      fechaFin: document.getElementById("fechaFin").value,
    };

    try {
      if (id) {
        await actualizarPractica({ ...datos, practicaId: parseInt(id) });
      } else {
        await crearPractica(datos);
      }
      navigate("/practicas");
    } catch (error) {
      console.error("Error al guardar práctica:", error);
    }
  };

  return (
    <div>
      <h2>{id ? "Editar Práctica" : "Nueva Práctica"}</h2>
      <form onSubmit={handleSubmit}>
        <label>
          Alumno:
          <select id="alumnoId" required>
            <option value="">-- Seleccionar Alumno --</option>
            {alumnos.map((al) => (
              <option key={al.alumnoId} value={al.alumnoId}>
                {al.nombre} {al.apellidos}
              </option>
            ))}
          </select>
        </label>
        <br />

        <label>
          Empresa:
          <select id="empresaId" required>
            <option value="">-- Seleccionar Empresa --</option>
            {empresas.map((em) => (
              <option key={em.empresaId} value={em.empresaId}>
                {em.nombre}
              </option>
            ))}
          </select>
        </label>
        <br />

        <label>
          Fecha Inicio: <input type="date" id="fechaInicio" required />
        </label>
        <br />

        <label>
          Fecha Fin: <input type="date" id="fechaFin" required />
        </label>
        <br />

        <button type="submit">{id ? "Guardar Cambios" : "Crear Práctica"}</button>
      </form>
    </div>
  );
};

export default PracticaFormularioPage;

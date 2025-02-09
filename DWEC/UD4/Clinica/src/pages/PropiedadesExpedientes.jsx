import { useState, useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";
import $negocio from "../services/negocio";

function PropiedadesExpediente(){
  const { id } = useParams(); // Obtener ID de la URL
  const navigate = useNavigate(); // Para redireccionar
  const [expediente, setExpediente] = useState({
    pacienteId: "",
    fechaApertura: "",
    antecedentes: "",
    diagnosticos: "",
    tratamientos: "",
    observaciones: "",
  });

  useEffect(() => {
    if (id) {
      cargarExpediente();
    }
  }, [id]);

  const cargarExpediente = async () => {
    try {
      const datos = await $negocio.obtenerExpediente(id);
      setExpediente(datos);
    } catch (error) {
      console.error("Error cargando expediente:", error);
    }
  };

  const handleChange = (e) => {
    setExpediente({ ...expediente, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      if (id) {
        await $negocio.actualizarExpediente(id, expediente);
      } else {
        await $negocio.crearExpediente(expediente);
      }
      navigate("/expedientes"); // Redirigir a la lista
    } catch (error) {
      console.error("Error guardando expediente:", error);
    }
  };

  return (
    <div className="container mt-5">
      <h2 className="text-center text-primary">{id ? "Editar Expediente" : "Crear Expediente"}</h2>

      <form onSubmit={handleSubmit} className="mt-4">

        <div className="mb-3">
          <label className="form-label">Fecha de Apertura</label>
          <input
            type="date"
            name="fechaApertura"
            className="form-control"
            value={expediente.fechaApertura}
            onChange={handleChange}
            required
          />
        </div>

        <div className="mb-3">
          <label className="form-label">Antecedentes</label>
          <textarea
            name="antecedentes"
            className="form-control"
            value={expediente.antecedentes}
            onChange={handleChange}
          ></textarea>
        </div>

        <div className="mb-3">
          <label className="form-label">Diagnósticos</label>
          <textarea
            name="diagnosticos"
            className="form-control"
            value={expediente.diagnosticos}
            onChange={handleChange}
          ></textarea>
        </div>

        <div className="mb-3">
          <label className="form-label">Tratamientos</label>
          <textarea
            name="tratamientos"
            className="form-control"
            value={expediente.tratamientos}
            onChange={handleChange}
          ></textarea>
        </div>

        <div className="mb-3">
          <label className="form-label">Observaciones</label>
          <textarea
            name="observaciones"
            className="form-control"
            value={expediente.observaciones}
            onChange={handleChange}
          ></textarea>
        </div>

        <div className="d-flex justify-content-between">
          <button type="submit" className="btn btn-success">
            {id ? "Guardar Cambios" : "Crear Expediente"}
          </button>
          <button type="button" className="btn btn-secondary" onClick={() => navigate("/expedientes")}>
            Cancelar
          </button>
        </div>
      </form>
    </div>
  );
};

export default PropiedadesExpediente;

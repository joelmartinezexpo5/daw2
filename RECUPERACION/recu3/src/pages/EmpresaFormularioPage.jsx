import { useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";
import {
  obtenerEmpresa,
  crearEmpresa,
  actualizarEmpresa,
} from "../services/empresasService";

const EmpresaFormularioPage = () => {
  const { id } = useParams();
  const navigate = useNavigate();

  useEffect(() => {
    if (id) {
      obtenerEmpresa(id).then((empresa) => {
        document.getElementById("nombre").value = empresa.nombre;
        document.getElementById("contacto").value = empresa.contacto;
        document.getElementById("telefono").value = empresa.telefono;
        document.getElementById("email").value = empresa.email;
        document.getElementById("direccion").value = empresa.direccion;
      });
    }
  }, [id]);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const datos = {
      nombre: document.getElementById("nombre").value,
      contacto: document.getElementById("contacto").value,
      telefono: document.getElementById("telefono").value,
      email: document.getElementById("email").value,
      direccion: document.getElementById("direccion").value,
    };

    try {
      if (id) {
        await actualizarEmpresa({ ...datos, empresaId: parseInt(id) });
      } else {
        await crearEmpresa(datos);
      }
      navigate("/empresas");
    } catch (error) {
      console.error("Error al guardar empresa:", error);
    }
  };

  return (
    <div>
      <h2>{id ? "Editar Empresa" : "Nueva Empresa"}</h2>
      <form onSubmit={handleSubmit}>
        <label>Nombre: <input id="nombre" required /></label><br />
        <label>Contacto: <input id="contacto" required /></label><br />
        <label>Teléfono: <input id="telefono" required /></label><br />
        <label>Email: <input id="email" type="email" required /></label><br />
        <label>Dirección: <input id="direccion" required /></label><br />
        <button type="submit">{id ? "Guardar Cambios" : "Crear Empresa"}</button>
      </form>
    </div>
  );
};

export default EmpresaFormularioPage;

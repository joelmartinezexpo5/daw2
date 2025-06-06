import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import {
  obtenerEmpresas,
  eliminarEmpresa,
} from "../services/empresasService";

const EmpresasPage = () => {
  const [empresas, setEmpresas] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    cargarEmpresas();
  }, []);

  const cargarEmpresas = () => {
    obtenerEmpresas().then((data) => setEmpresas(data));
  };

  const handleEditar = (id) => {
    navigate(`/empresas/editar/${id}`);
  };

  const handleEliminar = async (id) => {
    if (window.confirm("¿Estás seguro de que quieres eliminar esta empresa?")) {
      try {
        await eliminarEmpresa(id);
        cargarEmpresas();
      } catch (e) {
        console.error("Error al eliminar:", e);
      }
    }
  };

  const handleCrear = () => {
    navigate("/empresas/nueva");
  };

  return (
    <div>
      <h2>Listado de Empresas</h2>
      <button onClick={handleCrear}>Nueva Empresa</button>
      <div className="tabla">
        <div className="linea cabecera">
          <div>Nombre</div>
          <div>Contacto</div>
          <div>Teléfono</div>
          <div>Email</div>
          <div>Dirección</div>
          <div>Acciones</div>
        </div>
        {empresas.map((empresa) => (
          <div key={empresa.empresaId} className="linea">
            <div>{empresa.nombre}</div>
            <div>{empresa.contacto}</div>
            <div>{empresa.telefono}</div>
            <div>{empresa.email}</div>
            <div>{empresa.direccion}</div>
            <div>
              <button onClick={() => handleEditar(empresa.empresaId)}>Editar</button>
              <button onClick={() => handleEliminar(empresa.empresaId)}>Eliminar</button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default EmpresasPage;

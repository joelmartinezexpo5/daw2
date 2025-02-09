import { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import $negocio from "../services/negocio";

function PropiedadesUsuario(){
  const { id } = useParams();
  const navigate = useNavigate();
  const [usuario, setUsuario] = useState({
    username: "",
    password: "",
    tipo: "",
  });

  useEffect(() => {
    if (id !== "nuevo") {
      cargarUsuario();
    }
  }, [id]);

  const cargarUsuario = async () => {
    const datos = await $negocio.obtenerUsuario(id);
    setUsuario(datos);
  };

  const handleChange = (e) => {
    setUsuario({ ...usuario, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (id) {
      await $negocio.actualizarUsuario(id, usuario);
    } else {
      await $negocio.crearUsuario(usuario);    
    }
    navigate("/usuarios");
  };


  return (
    <div className="container mt-5">
      <h2 className="text-center text-primary mb-4">{id === "nuevo" ? "Crear Usuario" : "Editar Usuario"}</h2>
      
      <form onSubmit={handleSubmit} className="border p-4 rounded shadow">
        <div className="mb-3">
          <label className="form-label">Username</label>
          <input
            type="text" className="form-control" name="nombre" onChange={handleChange} required
          />
        </div>

        <div className="mb-3">
          <label className="form-label">Password</label>
          <input
            type="password" className="form-control" name="email" onChange={handleChange} required
          />
        </div>

        <div className="mb-3">
          <label className="form-label">Tipo</label>
          <select className="form-control" name="rol" onChange={handleChange}>
            <option value="usuario">Usuario</option>
            <option value="admin">Administrador</option>
          </select>
        </div>

        <div className="d-flex justify-content-between">
          <button type="submit" className="btn btn-success">Guardar</button>
          <button type="button" className="btn btn-secondary" onClick={() => navigate("/usuarios")}>
            Volver
          </button>
        </div>
      </form>
    </div>
  );
};

export default PropiedadesUsuario;

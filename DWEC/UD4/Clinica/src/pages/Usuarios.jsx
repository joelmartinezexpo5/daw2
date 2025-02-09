import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import $negocio from "../services/negocio";

function Usuarios(){
  const [usuarios, setUsuarios] = useState([]);

  useEffect(() => {
    cargarUsuarios();
  }, []);

  const cargarUsuarios = async () => {
    const datos = await $negocio.obtenerUsuarios();
    setUsuarios(datos);
  };

  const handleEliminar = async (id) => {
    if (window.confirm("¿Estás seguro de eliminar este usuario?")) {
      await $negocio.eliminarUsuario(id);
      cargarUsuarios();
    }
  };

  return (
    <div className="container mt-5">
      <h2 className="text-center text-primary mb-4">Gestión de Usuarios</h2>
      <div className="d-flex justify-content-between mb-3">
        <Link to="/usuarios/nuevo" className="btn btn-success">Crear Usuario</Link>
      </div>

      <table className="table table-striped table-hover">
        <thead className="table-primary">
          <tr>
            <th>Username</th>
            <th>password</th>
            <th>Tipo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          {usuarios.map((usuario) => (
            <tr key={usuario.id}>
              <td>{usuario.username}</td>
              <td>{usuario.password}</td>
              <td>{usuario.tipo}</td>
              <td>
                <Link to={`/usuarios/${usuario.id}`} className="btn btn-warning btn-sm me-2">
                  Editar
                </Link>
                <button onClick={() => handleEliminar(usuario.id)} className="btn btn-danger btn-sm">
                  Eliminar
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default Usuarios;

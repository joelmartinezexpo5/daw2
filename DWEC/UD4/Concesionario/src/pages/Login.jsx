import { useState } from "react";
import { validarUsuario } from "../services/negocio";

const Login = () => {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");

  const handleLogin = async () => {
    const usuario = await validarUsuario(username, password);
    if (usuario) {
      alert(`Bienvenido ${usuario.nombre}`);
    } else {
      alert("Usuario o contraseña incorrectos");
    }
  };

  return (
    <div>
      <h2>Login</h2>
      <input type="text" placeholder="Usuario" onChange={(e) => setUsername(e.target.value)} />
      <input type="password" placeholder="Contraseña" onChange={(e) => setPassword(e.target.value)} />
      <button onClick={handleLogin}>Ingresar</button>
    </div>
  );
};

export default Login;

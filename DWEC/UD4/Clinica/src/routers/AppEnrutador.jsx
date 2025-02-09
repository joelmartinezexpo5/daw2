import { BrowserRouter, Route, Routes, Navigate } from "react-router-dom";
import { useAuth } from '../context/AuthContext'; // Usamos el contexto de autenticación
import AppLayout from "../components/AppLayout";
import HomePage from "../pages/HomePage";
import Pacientes from "../pages/Pacientes";
import PropiedadesPaciente from "../pages/PropiedadesPaciente";
import Expedientes from "../pages/Expedientes";
import PropiedadesExpediente from "../pages/PropiedadesExpedientes";
import Usuarios from "../pages/Usuarios";
import PropiedadesUsuario from "../pages/PropiedadesUsuario";
import Login from "../pages/Login";
import ErrorPage from "../pages/ErrorPage";

function AppEnrutador() {
  const { user } = useAuth(); // Obtenemos el usuario autenticado

  // Función para verificar roles de usuario
  const hasRole = (tipos) => {
    return user && tipos.includes(user.tipo); // Si el usuario tiene uno de los roles permitidos
  };

  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<AppLayout />} >
          <Route index element={<HomePage />} />
          
          {/* Pacientes: solo si tiene los roles 'admin' o 'gestion' */}
          <Route path="pacientes" element={hasRole(['admin', 'gestion']) ? <Pacientes /> : <Navigate to="/login" />} />
          
          {/* Propiedades de paciente: solo para 'gestion' */}
          <Route path="pacientes/nuevo" element={hasRole(['gestion']) ? <PropiedadesPaciente /> : <Navigate to="/login" />} />
          <Route path="pacientes/editar/:id" element={hasRole(['gestion']) ? <PropiedadesPaciente /> : <Navigate to="/login" />} />

          {/* Expedientes: solo para 'medico' o 'admin' */}
          <Route path="expedientes" element={hasRole(['medico', 'admin']) ? <Expedientes /> : <Navigate to="/login" />} />
          <Route path="expedientes/:id" element={hasRole(['medico', 'admin']) ? <PropiedadesExpediente /> : <Navigate to="/login" />} />

          {/* Usuarios: solo para 'admin' */}
          <Route path="usuarios" element={hasRole(['admin']) ? <Usuarios /> : <Navigate to="/login" />} />
          <Route path="usuarios/:id" element={hasRole(['admin']) ? <PropiedadesUsuario /> : <Navigate to="/login" />} />
          
          {/* Ruta pública de login */}
          <Route path="login" element={<Login />} />

          {/* Ruta para manejar errores (página no encontrada) */}
          <Route path="*" element={<ErrorPage />} />
        </Route>
      </Routes>
    </BrowserRouter >
  );
}

export default AppEnrutador;

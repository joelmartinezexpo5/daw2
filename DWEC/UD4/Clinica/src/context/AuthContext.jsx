// src/context/AuthContext.jsx
import { createContext, useState, useContext } from 'react';
import $negocio from '../services/negocio'

const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const [user, setUser] = useState(null); // Usuario autenticado
  const [message, setMessage] = useState(null); // Mensajes temporales

  const login = async (username, password) => {
    // Simula la validación del usuario usando el servicio $negocio
    const userData = await $negocio.validarUsuario(username, password);
    if (userData) {
      setUser(userData);
      setMessage({ type: 'success', text: 'Inicio de sesión exitoso' });
    } else {
      setMessage({ type: 'error', text: 'Usuario o contraseña incorrectos' });
    }
  };

  const logout = () => {
    setUser(null);
    setMessage({ type: 'info', text: 'Sesión cerrada' });
  };

  return (
    <AuthContext.Provider value={{ user, message, login, logout, setMessage }}>
      {children}
    </AuthContext.Provider>
  );
};

export const useAuth = () => useContext(AuthContext);
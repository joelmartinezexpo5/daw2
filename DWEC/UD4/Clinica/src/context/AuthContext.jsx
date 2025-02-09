import { createContext, useState, useContext, useEffect } from 'react';
import $negocio from '../services/negocio';

const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const [user, setUser] = useState(() => {
    // Intenta obtener al usuario desde localStorage
    const storedUser = localStorage.getItem('user');
    return storedUser ? JSON.parse(storedUser) : null;  // Si existe, lo parseamos
  });

  const [message, setMessage] = useState(null);

  // Guardar el mensaje de éxito/error por 3 segundos
  useEffect(() => {
    if (message) {
      const timer = setTimeout(() => setMessage(null), 3000);
      return () => clearTimeout(timer);
    }
  }, [message]);

  const login = async (username, password) => {
    const userData = await $negocio.validarUsuario(username, password);
    if (userData) {
      setUser(userData);
      localStorage.setItem('user', JSON.stringify(userData));  // Guardar el usuario en localStorage
      setMessage({ type: 'success', text: 'Inicio de sesión exitoso' });
      return true;
    } else {
      setMessage({ type: 'error', text: 'Usuario o contraseña incorrectos' });
      return false;
    }
  };

  const logout = () => {
    setUser(null);
    localStorage.removeItem('user');  // Eliminar al usuario del localStorage
    setMessage({ type: 'info', text: 'Sesión cerrada' });
  };

  return (
    <AuthContext.Provider value={{ user, message, login, logout }}>
      {children}
    </AuthContext.Provider>
  );
};

export const useAuth = () => useContext(AuthContext);

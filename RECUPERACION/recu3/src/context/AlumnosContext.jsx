// src/context/AlumnosContext.jsx
import { createContext, useEffect, useState } from "react";
import { obtenerAlumnos } from "../services/alumnosService";

const AlumnosContext = createContext();

function AlumnosProvider({ children }) {
  const [alumnos, setAlumnos] = useState([]);

  const llenarAlumnos = async () => {
    const resultado = await obtenerAlumnos();
    setAlumnos(resultado);
  };

  useEffect(() => {
    llenarAlumnos();
  }, []);

  return (
    <AlumnosContext.Provider value={{ alumnos, setAlumnos, llenarAlumnos }}>
      {children}
    </AlumnosContext.Provider>
  );
}

export { AlumnosContext, AlumnosProvider };

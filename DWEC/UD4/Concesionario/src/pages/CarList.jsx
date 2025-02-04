import { useState, useEffect } from "react";
import { obtenerCoches } from "../services/negocio";
import CarCard from "../components/CarCard";

const CarList = () => {
  const [coches, setCoches] = useState([]);
  const [busqueda, setBusqueda] = useState("");

  useEffect(() => {
    obtenerCoches().then(setCoches);
  }, []);

  const filtrados = coches.filter((coche) =>
    coche.marca.toLowerCase().includes(busqueda.toLowerCase())
  );

  return (
    <div>
      <h2>Listado de Coches</h2>
      <input
        type="text"
        placeholder="Buscar por marca..."
        value={busqueda}
        onChange={(e) => setBusqueda(e.target.value)}
      />
      <div className="coches-grid">
        {filtrados.map((coche) => (
          <CarCard key={coche.id} coche={coche} />
        ))}
      </div>
    </div>
  );
};

export default CarList;

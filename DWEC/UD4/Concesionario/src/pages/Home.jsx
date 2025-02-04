import { useEffect, useState } from "react";
import { obtenerCoches } from "../services/negocio";
import CarCard from "../components/CarCard";

const Home = () => {
  const [coches, setCoches] = useState([]);

  useEffect(() => {
    obtenerCoches().then(setCoches);
  }, []);

  return (
    <div>
      <h1>Bienvenido al Concesionario</h1>
      <div className="coches-grid">
        {coches.map((coche) => (
          <CarCard key={coche.id} coche={coche} />
        ))}
      </div>
    </div>
  );
};

export default Home;

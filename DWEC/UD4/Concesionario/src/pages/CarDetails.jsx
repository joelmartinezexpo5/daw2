import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import { obtenerCoche } from "../services/negocio";

const CarDetails = () => {
  const { id } = useParams();
  const [coche, setCoche] = useState(null);

  useEffect(() => {
    obtenerCoche(id).then(setCoche);
  }, [id]);

  if (!coche) return <p>Cargando...</p>;

  return (
    <div>
      <h2>{coche.marca} {coche.modelo}</h2>
      <p>Año: {coche.anno}</p>
      <p>Kilómetros: {coche.km}</p>
      <p>Precio: {coche.precio}€</p>
    </div>
  );
};

export default CarDetails;

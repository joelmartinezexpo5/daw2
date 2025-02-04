import { Link } from "react-router-dom";

const CarCard = ({ coche }) => {
  return (
    <div className="car-card">
      <h3>{coche.marca} {coche.modelo}</h3>
      <p>Año: {coche.anno}</p>
      <p>Precio: {coche.precio}€</p>
      <Link to={`/coches/${coche.id}`}>Ver más</Link>
    </div>
  );
};

export default CarCard;

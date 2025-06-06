
import { Link } from "react-router-dom";
import "./AppMenu.css";
function AppMenu() {
    return (<nav className="navegacion">
        <ul>
            <li><Link to="/">Inicio</Link></li>
            <li><Link to="/alumnos">Alumnos</Link></li>
            <li><Link to="/empresas">Empresas</Link></li>
            <li><Link to="/practicas">Practicas</Link></li>
            {/* <li><Link to="/login">Iniciar sesion</Link></li> */}
        </ul>
    </nav>);
}

export default AppMenu;

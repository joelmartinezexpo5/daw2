import { Link } from "react-router-dom";
import "./AppMenu.css";

function AppMenu(){
    return(<nav className="navegacion">
        <ul>
            <li><Link to="/">Inicio</Link></li>
            <li><Link to="/pacientes">Pacientes</Link></li>
            <li><Link to="/expedientes">Expedientes</Link></li>
            <li><Link to="/usuarios">Usuarios</Link></li>
            <li><Link to="/login">Iniciar sesion</Link></li>
        </ul>
    </nav>

    );
}
export default AppMenu;
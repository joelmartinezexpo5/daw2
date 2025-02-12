import { Link } from "react-router-dom";
import "./AppMenu.css";

function AppMenu() {
    return (
        <>
            <nav className="navbar-vertical">
                {/* Logo en la parte superior */}
                <div className="navbar-brand">
                    <Link to="/">
                        <img 
                            src="../../public/images/logo_sede_torrelavega.png" 
                            alt="Logo Torrelavega" 
                            height="85" 
                        />
                    </Link>
                </div>

                {/* Menú de navegación vertical */}
                <ul className="navbar-nav">
                    <li className="nav-item">
                        <Link to="/" className="nav-link" aria-current="page">
                            Inicio
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/equipos" className="nav-link">
                            Equipos
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/clasificacion" className="nav-link">
                            Clasificación
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/faseFinal" className="nav-link">
                            Fase Final
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/informacion" className="nav-link">
                            Información
                        </Link>
                    </li>
                </ul>
            </nav>
        </>
    );
}

export default AppMenu;
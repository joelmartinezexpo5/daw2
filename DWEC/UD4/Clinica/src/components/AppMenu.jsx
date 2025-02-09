import { Link } from "react-router-dom";
import "./AppMenu.css";
import { useAuth } from "../context/AuthContext";

function AppMenu() {
const {user, logout} = useAuth();

    return (<nav className="navbar navbar-expand-lg navbar-dark bg-dark">
        <div className="container-fluid">
            <Link className="navbar-brand" to="/">
                Clínica
            </Link>
            <button
                className="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarNav">
                <ul className="navbar-nav ms-auto">
                    <li className="nav-item">
                        <Link className="nav-link" to="/">
                            Inicio
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className="nav-link" to="/pacientes">
                            Pacientes
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className="nav-link" to="/expedientes">
                            Expedientes
                        </Link>
                    </li>
                    <li className="nav-item">
                        <Link className="nav-link" to="/usuarios">
                            Usuarios
                        </Link>
                    </li>
                    {user ? (
                        <>
                            <li className="nav-link text-light">Bienvenido, {user.username}</li>
                            <li><button className="btn btn-outline-danger" onClick={logout}>Cerrar Sesion</button></li>
                        </>
                    ) : (
                        <li className="nav-item"><Link className="nav-link" to="/login">Iniciar sesion</Link></li>
                    )}

                    {/* <li className="nav-item">
                        <Link className="nav-link" to="/login">
                            Iniciar sesión
                        </Link>
                    </li> */}
                </ul>
            </div>
        </div>
    </nav>
    );
}

export default AppMenu;
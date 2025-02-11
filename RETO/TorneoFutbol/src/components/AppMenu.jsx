import { Link } from "react-router-dom";
import "./AppMenu.css";
function AppMenu() {
    return (
        <>
            <nav className="navbar navbar-expand-lg navbar-dark bg-dark static-top">
                <div className="container">
                    <Link to="/"><img src="../../public/images/logo_sede_torrelavega.png" alt="..." height="85" /></Link>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav ms-auto">
                            <li className="nav-item">
                                <Link to="/" className="nav-link active" aria-current="page">Inicio</Link>
                            </li>
                            <li className="nav-item">
                                <Link to="/equipos" className="nav-link active">Equipos</Link>
                            </li>
                            <li className="nav-item">
                                <Link to="/clasificacion" className="nav-link active">Clasificacion</Link>
                            </li>
                            <li className="nav-item">
                                <Link to="/faseFinal" className="nav-link active">Fase Final</Link>
                            </li>
                            <li className="nav-item">
                                <Link to="/informacion" className="nav-link active">Informacion</Link>
                            </li>


                            {/* <li className="nav-item dropdown">
                                <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul className="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a className="dropdown-item" href="#">Action</a></li>
                                    <li><a className="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr className="dropdown-divider" />
                                    </li>
                                    <li><a className="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li> */}
                        </ul>
                    </div>
                </div>
            </nav>
        </>
    )
}
export default AppMenu;

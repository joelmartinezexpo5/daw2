import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import AppLayout from "../src/components/AppLayout";

// Importa tus páginas (cuando las tengas creadas)
import AlumnosPage from "../src/pages/AlumnosPage";
import EmpresasPage from "../src/pages/EmpresasPage";
import PracticasPage from "../src/pages/PracticasPage";
import PracticaEditarPage from "../src/pages/PracticaFormularioPage";
import AlumnoFormularioPage from "../src/pages/AlumnoFormularioPage";
import EmpresaFormularioPage from "../src/pages/EmpresaFormularioPage";
import PracticaFormularioPage from "../src/pages/PracticaFormularioPage";

export default function AppEnrutador() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<AppLayout />}>
                    <Route index element={<AlumnosPage />} />
                    <Route path="alumnos" element={<AlumnosPage />} />
                    <Route path="/alumnos/nuevo" element={<AlumnoFormularioPage />} />
                    <Route path="/alumnos/editar/:id" element={<AlumnoFormularioPage />} />
                    <Route path="empresas" element={<EmpresasPage />} />
                    <Route path="/empresas/nueva" element={<EmpresaFormularioPage />} />
                    <Route path="/empresas/editar/:id" element={<EmpresaFormularioPage />} />
                    <Route path="practicas" element={<PracticasPage />} />
                    <Route path="/practicas/nueva" element={<PracticaFormularioPage />} />
                    <Route path="/practicas/editar/:id" element={<PracticaFormularioPage />} />
                </Route>
            </Routes>
        </Router>
    );
}

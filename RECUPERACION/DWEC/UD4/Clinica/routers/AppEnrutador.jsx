import { BrowserRouter, Routes, Route } from "react-router-dom";
import AppLayout from "../components/AppLayout";
import HomePage from "../pages/HomePage";
import Pacientes from "../pages/Pacientes";
import PropiedadesPaciente from "../pages/PropiedadesPaciente";
import Expedientes from "../pages/Expedientes";
import Usuarios from "../pages/Usuarios";
import Login from "../pages/Login";
import ErrorPage from "../pages/ErrorPage";
import PropiedadesExpediente from "../pages/PropiedadesExpediente";
import PropiedadesUsuario from "../pages/PropiedadesUsuario";

function AppEnrutador() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<AppLayout />}>
                    <Route index element={<HomePage />} />
                    <Route path="pacientes" element={<Pacientes />} />
                    <Route path="paciente/:id" element={<PropiedadesPaciente />} />
                    <Route path="expedientes" element={<Expedientes />} />
                    <Route path="expediente/:id" element={<PropiedadesExpediente />} />
                    <Route path="usuarios" element={<Usuarios />} />
                    <Route path="usuario/:id" element={<PropiedadesUsuario />} />
                    <Route path="login" element={<Login />} />
                    <Route path="error" element={<ErrorPage />} />
                </Route>
            </Routes>
        </BrowserRouter>
    );
}
export default AppEnrutador;
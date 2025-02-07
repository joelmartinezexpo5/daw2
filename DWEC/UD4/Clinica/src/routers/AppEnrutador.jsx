import { BrowserRouter, Route, Routes } from "react-router-dom";
import AppLayout from "../components/AppLayout";
import HomePage from "../pages/HomePage";
import Pacientes from "../pages/Pacientes";
import PropiedadesPaciente from "../pages/PropiedadesPaciente";
import Expedientes from "../pages/Expedientes";
import PropiedadesExpediente from "../pages/PropiedadesExpedientes";
import Usuarios from "../pages/Usuarios";
import PropiedadesUsuario from "../pages/PropiedadesUsuario";
import Login from "../pages/Login";

function AppEnrutador() {
    return (
        <>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<AppLayout />} >
                        <Route index element={<HomePage />} />
                        <Route path="pacientes" element={<Pacientes />} />
                        <Route path="pacientes/nuevo" element={<PropiedadesPaciente />} />
                        <Route path="pacientes/editar/:id" element={<PropiedadesPaciente />} />
                        <Route path="expedientes" element={<Expedientes />} />
                        <Route path="expedientes/:id" element={<PropiedadesExpediente />} />
                        <Route path="usuarios" element={<Usuarios />} />
                        <Route path="usuarios/:id" element={<PropiedadesUsuario />} />
                        <Route path="login" element={<Login />} />
                    </Route>
                </Routes>
            </BrowserRouter >
        </>
    )
}
export default AppEnrutador;
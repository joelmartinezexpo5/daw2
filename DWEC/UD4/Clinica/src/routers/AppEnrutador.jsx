import { BrowserRouter, Route } from "react-router-dom";
import AppLayout from "../components/AppLayout";
import HomePage from "../pages/HomePage";
import Pacientes from "../pages/Pacientes";
import PropiedadesPaciente from "../pages/PropiedadesPaciente";
import Expedientes from "../pages/Expedientes";

function AppEnrutador(){
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<AppLayout />} />
                <Route index element={<HomePage />}/>
                <Route path="pacientes" element={<Pacientes />}/>
                <Route path="pacientes/:id" element={<PropiedadesPaciente />} />
                <Route path="expedientes" element={<Expedientes />} />


            </Routes>
        </BrowserRouter>
    )
}
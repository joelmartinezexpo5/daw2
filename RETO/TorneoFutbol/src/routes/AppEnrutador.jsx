import { BrowserRouter, Routes, Route } from "react-router-dom";
import AppLayout from "../Components/AppLayout";
import HomePage from "../Pages/HomePage";
import Equipos from "../pages/Equipos";
import Clasificacion from "../pages/Clasificacion";
import FaseFinal from "../pages/FaseFinal";
import InformacionRetos from "../pages/InformacionRetos";

function AppEnrutador() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<AppLayout />}>
                    <Route index element={<HomePage />} />
                    <Route path="equipos" element={<Equipos />} />
                    <Route path="clasificacion" element={<Clasificacion />}/>
                    <Route path="faseFinal" element={<FaseFinal />} />
                    <Route path="informacion" element={<InformacionRetos />} />
                </Route>
            </Routes>
        </BrowserRouter>
    );
}
export default AppEnrutador;
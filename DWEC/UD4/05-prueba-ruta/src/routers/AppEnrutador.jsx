import { BrowserRouter, Route, Routes } from "react-router-dom"
import HomePage from "../pages/HomePage";
import ListaPage from "../pages/ListaPage";
import DetallesPage from "../pages/DetallesPage";
import AdministracionPage from "../pages/AdministracionPage";
import NoPage from "../pages/NoPage";
import AppLayout from "../components/AppLayout";

function AppEnrutador() {
    return (
        <>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<AppLayout />} >
                        <Route index element={<HomePage />} />
                        <Route path="listado" element={<ListaPage />} />
                        <Route path="detalles" element={<DetallesPage />} />
                        <Route path="administracion" element={<AdministracionPage />} />
                        <Route path="*" element={<NoPage />} />
                    </Route>
                </Routes>
            </BrowserRouter>
        </>
    )
}
export default AppEnrutador;
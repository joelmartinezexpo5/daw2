import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter } from "react-router-dom";
import AppEnrutador from "./routers/AppEnrutador";
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
import "./index.css"; // Opcional si tienes estilos globales

ReactDOM.createRoot(document.getElementById("root")).render(
  <React.StrictMode>
    <BrowserRouter>
      <Navbar />
      <AppEnrutador />
      <Footer />
    </BrowserRouter>
  </React.StrictMode>
);

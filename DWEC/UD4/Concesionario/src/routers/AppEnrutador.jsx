import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "../pages/Home";
import CarList from "../pages/CarList";
import CarDetails from "../pages/CarDetails";
import Login from "../pages/Login";
import NotFound from "../pages/NotFound";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
// import "./App.css";

function AppEnrutador() {
  return (
    <Router>
      <Navbar />
      <div className="container">
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/cars" element={<CarsList />} />
          <Route path="/cars/:id" element={<CarDetails />} />
          <Route path="/login" element={<Login />} />
          <Route path="*" element={<NotFound />} />
        </Routes>
      </div>
      <Footer />
    </Router>
  );
}

export default AppEnrutador;
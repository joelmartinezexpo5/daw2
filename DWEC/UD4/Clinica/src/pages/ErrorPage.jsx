import React from 'react';
import { Link } from 'react-router-dom';

function ErrorPage(){
  return (
    <div style={{ textAlign: 'center', padding: '50px' }}>
      <h1 style={{ fontSize: '3em', color: '#ff4d4d' }}>¡Vaya! Página no encontrada</h1>
      <p style={{ fontSize: '1.2em' }}>La página que estás buscando no existe o ha sido movida.</p>
      <p>
        <Link to="/" style={{ fontSize: '1.5em', textDecoration: 'underline', color: '#007bff' }}>
          Volver al inicio
        </Link>
      </p>
    </div>
  );
};

export default ErrorPage;

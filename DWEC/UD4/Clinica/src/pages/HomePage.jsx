import React from 'react';

function HomePage(){
  return (
    <div style={{ textAlign: 'center', padding: '50px' }}>
      <h1 style={{ fontSize: '3em', color: '#007bff' }}>Bienvenido a la Gestión de la Clinica</h1>
      <p style={{ fontSize: '1.5em', color: '#333' }}>
        Plataforma para la gestión de pacientes, expedientes médicos y usuarios de manera eficiente.
      </p>
      <p style={{ fontSize: '1.2em', color: '#555' }}>
        Administra, visualiza y controla todos los aspectos de la información médica y administrativa.
      </p>
    </div>
  );
};

export default HomePage;

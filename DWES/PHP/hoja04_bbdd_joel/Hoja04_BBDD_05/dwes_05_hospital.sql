CREATE DATABASE dwes_05_hospital;

USE dwes_05_hospital;

CREATE TABLE turnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(10),
    nombre VARCHAR(100),
    edad INT,
    turno_id INT,
    tipo VARCHAR(20),
    FOREIGN KEY (turno_id) REFERENCES turnos(id)
);

CREATE TABLE familia (
    medico_id INT,
    numPacientes INT,
    unidad VARCHAR(100),
    FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

CREATE TABLE urgencias (
    medico_id INT,
    unidad VARCHAR(100),
    FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

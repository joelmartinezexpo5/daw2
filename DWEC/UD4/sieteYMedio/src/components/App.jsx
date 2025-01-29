import React, { useState } from 'react';
import { baraja as barajaOriginal, barajarCartas, sumarCartas, recuperarCarta } from '../utils/baraja.js';
import Carta from './Carta.jsx';
import './estilos.css';

const App = () => {
  const [baraja, setBaraja] = useState(barajarCartas([...barajaOriginal])); // Clonamos la baraja original
  const [manoJugador, setManoJugador] = useState([baraja.pop()]);
  const [manoCrupier, setManoCrupier] = useState([baraja.pop()]);
  const [ganadasJugador, setGanadasJugador] = useState(0);
  const [ganadasCrupier, setGanadasCrupier] = useState(0);
  const [turnoJugador, setTurnoJugador] = useState(true);
  const [partidaTerminada, setPartidaTerminada] = useState(false);

  const pedirCarta = () => {
    if (!turnoJugador || partidaTerminada || baraja.length === 0) return;
    
    const nuevaCarta = baraja.pop();
    if (!nuevaCarta) return;

    const nuevaMano = [...manoJugador, nuevaCarta];
    setManoJugador(nuevaMano);

    if (sumarCartas(nuevaMano) > 7.5) {
      setPartidaTerminada(true);
      setGanadasCrupier(ganadasCrupier + 1);
    }
  };

  const plantarse = () => {
    setTurnoJugador(false);
    jugarCrupier();
  };

  const jugarCrupier = () => {
    let nuevaMano = [...manoCrupier];

    while (sumarCartas(nuevaMano) < 5.5 && baraja.length > 0) {
      nuevaMano.push(baraja.pop());
    }

    setManoCrupier(nuevaMano);
    setPartidaTerminada(true);

    const puntosJugador = sumarCartas(manoJugador);
    const puntosCrupier = sumarCartas(nuevaMano);

    if (puntosCrupier > 7.5 || puntosJugador > puntosCrupier) {
      setGanadasJugador(ganadasJugador + 1);
    } else {
      setGanadasCrupier(ganadasCrupier + 1);
    }
  };

  const nuevaPartida = () => {
    const nuevaBaraja = barajarCartas([...barajaOriginal]); // Clonamos la baraja original
    if (nuevaBaraja.length < 2) return;

    setBaraja(nuevaBaraja);
    setManoJugador([nuevaBaraja.pop()]);
    setManoCrupier([nuevaBaraja.pop()]);
    setTurnoJugador(true);
    setPartidaTerminada(false);
  };

  return (
    <div className="juego">
      <h1>7 y Medio</h1>
      <h2>Jugador: {ganadasJugador} | Crupier: {ganadasCrupier}</h2>
      <button onClick={nuevaPartida} disabled={!partidaTerminada}>Nueva Partida</button>

      <h2>Crupier</h2>
      <div className="mano">
        {manoCrupier.map((carta, index) => {
          const cartaData = recuperarCarta(carta.id);
          return cartaData ? <Carta key={cartaData.id || index} carta={cartaData} /> : null;
        })}
        <p>Total: {sumarCartas(manoCrupier)}</p>
      </div>

      <h2>Jugador</h2>
      <div className="mano">
        {manoJugador.map((carta, index) => {
          const cartaData = recuperarCarta(carta.id);
          return cartaData ? <Carta key={cartaData.id || index} carta={cartaData} /> : null;
        })}
        <p>Total: {sumarCartas(manoJugador)}</p>
      </div>

      <button onClick={pedirCarta} disabled={!turnoJugador || partidaTerminada}>Dame Carta</button>
      <button onClick={plantarse} disabled={!turnoJugador || partidaTerminada}>Me Planto</button>
    </div>
  );
};

export default App;

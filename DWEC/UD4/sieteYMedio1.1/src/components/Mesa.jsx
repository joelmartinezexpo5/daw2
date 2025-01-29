import React, { useState } from "react";
import { barajarCartas, sumarCartas } from "../utils/baraja";
import Jugador from "./Jugador";
import { use } from "react";

function Mesa() {
    const [baraja, setBaraja] = useState(barajarCartas());
    const [manoJugador, setManoJugador] = useState([]);
    const [manoCrupier, setManoCrupier] = useState([]);
    const [ganadasJugador, setGanadasJugador] = useState(0);
    const [ganadasCrupier, setGanadasCrupier] = useState(0);
    const [turnoJugador, setTurnoJugador] = useState(true);
    const [partidaTerminada, setPartidaTerminada] = useState(false);

    function pedirCarta(){
        const nuevaMano = [...manoJugador, baraja.pop()];
        setManoJugador(nuevaMano);

        if(sumarCartas(nuevaMano) > 7.5){
            setPartidaTerminada(true);
            setGanadasCrupier(ganadasCrupier + 1);
        }
    }

    function jugarCrupier(){
        let nuevaMano=[...manoCrupier];
        let puntosCrupier=sumarCartas(nuevaMano);

        while(puntosCrupier <= 7.5){
            nuevaMano.push(baraja.pop());
            puntosCrupier = sumarCartas(nuevaMano);
        }

        setManoCrupier(nuevaMano);
        setPartidaTerminada(true);

        const puntosJugador = sumarCartas(manoJugador);

        if(puntosCrupier > 7.5 || puntosJugador > puntosCrupier){
            setGanadasJugador(ganadasJugador + 1);
        } else {
            setGanadasCrupier(ganadasCrupier + 1);
        }
    }

    function plantarse(){
        setTurnoJugador(false);
        jugarCrupier();
    }

    function nuevaPartida(){
        const nuevaBaraja = barajarCartas();
        setBaraja(nuevaBaraja);
        setManoJugador([nuevaBaraja.pop()]);
        setManoCrupier([nuevaBaraja.pop()]);
        setTurnoJugador(true);
        setPartidaTerminada(false);
    }

    return (
        <div>
            <h1>7 y medio</h1>
            <h2>Jugador: { ganadasJugador } | Crupier: { ganadasCrupier }</h2>
            <button onClick={nuevaPartida} disabled={!partidaTerminada}>Nueva partida</button>
            <Jugador nombre="Crupier" mano={ manoCrupier } />

            <Jugador nombre="Jugador" mano={ manoJugador } />
            {console.log(manoJugador)}

            to

            <button onClick={pedirCarta}  >Pedir carta</button>
            <button onClick={plantarse}>Me planto</button>
        </div>
    );
}
export default Mesa;
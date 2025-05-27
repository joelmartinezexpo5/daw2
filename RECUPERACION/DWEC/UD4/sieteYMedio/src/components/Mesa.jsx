import { useState } from "react";
import { barajarCartas, sumarCartas } from "../../core/baraja";

function Mesa(){
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
            setGanadasCrupier(ganadasCrupier + 1);
        }
    }

    function jugarCrupier(){
        const nuevaMano = [...manoCrupier, baraja.pop()];
        let puntosCrupier = sumarCartas(nuevaMano);

        while(puntosCrupier <= 7.5){
            nuevaMano.push(baraja.pop());

            puntosCrupier = sumarCartas(nuevaMano);
        }

        setManoCrupier(nuevaMano);
        setPartidaTerminada(true);

        const puntosJugador = sumarCartas(manoJugador);

        if(puntosCrupier > 7.5 || puntosJugador > puntosCrupier){
            setGanadasJugador(ganadasJugador + 1);
        }else{
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

    return(
        <>

        </>
    )


}
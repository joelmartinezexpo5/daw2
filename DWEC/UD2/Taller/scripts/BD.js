import datos from './datos-taller.js';
import Vehiculo from './Vehiculo.js';
import Reparacion from './Reparacion.js';
import Propietario from './Propietario.js';
import Trabajo from './Trabajo.js';

class BD{
    #vehiculos = [];
    #reparaciones = [];
    #siguienteVehiculoId;
    #siguienteReparacionId;

    constructor(){
        this.cargarDatos();
    }

    #cargarDatos() {
        datos.vehiculos.forEach(vehiculoData => {
            const propietario = new Propietario(vehiculoData.propietario.nombre, vehiculoData.propietario.telefono, vehiculoData.propietario.email);
            const vehiculo = new Vehiculo(vehiculoData.vehiculoId, vehiculoData.matricula, vehiculoData.marca, vehiculoData.modelo, vehiculoData.año, vehiculoData.motor, propietario);
            this.vehiculos.push(vehiculo);
        });

        datos.reparaciones.forEach(reparacionData => {
            const reparacion = new Reparacion(reparacionData.reparacionId, reparacionData.vehiculoId, reparacionData.descripcion, reparacionData.fecha, reparacionData.kilometros, reparacionData.presupuesto, reparacionData.aprobada, reparacionData.pagado, reparacionData.terminado);
            reparacionData.trabajos.forEach(trabajoData => {
                const trabajo = new Trabajo(trabajoData.concepto, trabajoData.precioUnitario, trabajoData.cantidad, trabajoData.totalTrabajo);
                reparacion.agregarTrabajo(trabajo);
            });
            this.reparaciones.push(reparacion);
        });
    }

    obtenerVehiculos(){
        return this.#vehiculos;
    }

    obtenerVehiculo(filtro, valor){

    }

    crearVehiculo(vehiculo){
        vehiculo.vehiculoId = this.#siguienteVehiculoId++
        this.#vehiculos.push(vehiculo);
    }
}


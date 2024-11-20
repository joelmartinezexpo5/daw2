import datos from './datos-taller.js';
import Vehiculo from './Vehiculo.js';
import Reparacion from './Reparacion.js';
import Propietario from './Propietario.js';
import Trabajo from './Trabajo.js';

class BD {
    #vehiculos = [];
    #reparaciones = [];
    #siguienteVehiculoId;
    #siguienteReparacionId;

    constructor() {
        this.#siguienteVehiculoId = 1;
        this.#siguienteReparacionId = 1;
        this.#cargarDatos();
        console.log('Vehículos cargados:', this.#vehiculos);
        console.log('Reparaciones cargadas:', this.#reparaciones);
    }


#cargarDatos() {
    datos.vehiculos.forEach(vehiculoData => {
        const propietario = new Propietario(
            vehiculoData.propietario.nombre,
            vehiculoData.propietario.telefono,
            vehiculoData.propietario.email
        );
        const vehiculo = new Vehiculo(
            vehiculoData.vehiculoId,
            vehiculoData.matricula,
            vehiculoData.marca,
            vehiculoData.modelo,
            vehiculoData.año,
            vehiculoData.motor,
            propietario
        );
        this.#vehiculos.push(vehiculo);
    });

    datos.reparaciones.forEach(reparacionData => {
        const reparacion = new Reparacion(
            reparacionData.reparacionId,
            reparacionData.vehiculoId,
            reparacionData.descripcion,
            reparacionData.fecha,
            reparacionData.kilometros,
            reparacionData.presupuesto,
            reparacionData.aprobada,
            reparacionData.pagado,
            reparacionData.terminado
        );
        reparacionData.trabajos.forEach(trabajoData => {
            const trabajo = new Trabajo(
                trabajoData.concepto,
                trabajoData.precioUnitario,
                trabajoData.cantidad,
                trabajoData.totalTrabajo
            );
            reparacion.agregarTrabajo(trabajo);
        });
        this.#reparaciones.push(reparacion);
    });

    this.#siguienteVehiculoId = Math.max(...this.#vehiculos.map(v => v.vehiculoId), 0) + 1;
    this.#siguienteReparacionId = Math.max(...this.#reparaciones.map(r => r.reparacionId), 0) + 1;
}

obtenerVehiculos() {
    return this.#vehiculos;
}

obtenerVehiculo(filtro, valor) {
    return this.#vehiculos.filter(vehiculo => {
        if (filtro === 'vehiculoId') {
            return vehiculo.vehiculoId === valor;
        } else if (filtro === 'matricula') {
            return vehiculo.matricula === valor;
        } else if (filtro === 'telefono') {
            return vehiculo.propietario.telefono === valor;
        }
        return false;
    });
}

crearVehiculo(vehiculo) {
    vehiculo.vehiculoId = this.#siguienteVehiculoId++;
    this.#vehiculos.push(vehiculo);
}

borrarVehiculo(vehiculoId) {
    this.#vehiculos = this.#vehiculos.filter(vehiculo => vehiculo.vehiculoId !== vehiculoId);
}

obtenerReparaciones(filtro, valor) {
    return this.#reparaciones.filter(reparacion => {
        if (filtro === 'fecha') {
            return reparacion.fecha === valor;
        } else if (filtro === 'pagado') {
            return reparacion.pagado === valor;
        } else if (filtro === 'terminado') {
            return reparacion.terminado === valor;
        }
        return false;
    });
}

obtenerReparacion(reparacionId) {
    return this.#reparaciones.find(reparacion => reparacion.reparacionId === reparacionId);
}

crearReparacion(vehiculoId, reparacion) {
    reparacion.reparacionId = this.#siguienteReparacionId++;
    reparacion.vehiculoId = vehiculoId;
    this.#reparaciones.push(reparacion);
}

borrarReparacion(reparacionId) {
    this.#reparaciones = this.#reparaciones.filter(reparacion => reparacion.reparacionId !== reparacionId);
}
}

export default BD;

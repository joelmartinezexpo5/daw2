import Linea from "./Linea.js";

class Factura {
    constructor() {
        this.clienteNIF = '';
        this.fecha = '';
        this.hora = '';
        this.pagada = false;
        this.lineas = [];
    }

    get importeTotal() {
        let total = 0;
        this.lineas.forEach(linea => {
            total += linea.cantidad * linea.precioUnitario;
        });
        return total;
    }

    get numeroArticulos() {
        return this.lineas.length;
    }


    agregarLinea(concepto, cantidad, precio) {
        if (concepto && cantidad > 0 && precio > 0) {
            this.lineas.push(new Linea(concepto, cantidad, precio));
        }
    }

    eliminarLinea() {
        if (this.lineas.length > 0) {
            this.lineas.pop();
        }
    }

    imprimirFactura() {
        let lineasTexto = '';
        for (let i = 0; i < this.lineas.length; i++) {
            const l = this.lineas[i];
            lineasTexto += `- ${l.concepto}: ${l.cantidad} x ${l.precioUnitario}€\n`;
        }

        return `Factura de ${this.clienteNIF}
    Fecha: ${this.fecha} ${this.hora}
    Pagada: ${this.pagada ? 'Sí' : 'No'} <br>
    Líneas: <br>
    ${lineasTexto}
    Total: ${this.importeTotal.toFixed(2)}€`;
    }

}
export default Factura;
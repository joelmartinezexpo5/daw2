// Factura.js
import { LineaFactura } from './LineaFactura.js';

export class Factura {
    constructor(clienteNIF, fecha, hora, pagada = false) {
        this.clienteNIF = clienteNIF;
        this.fecha = fecha;
        this.hora = hora;
        this.pagada = pagada;
        this.lineas = [];
    }

    get importeTotal() {
        return this.lineas.reduce((total, linea) => total + linea.importe, 0);
    }

    get numeroArticulos() {
        return this.lineas.length;
    }

    imprimirFactura() {
        let resultado = `Factura\nCliente: ${this.clienteNIF}\nFecha: ${this.fecha}\nHora: ${this.hora}\nPagada: ${this.pagada}\n\n`;
        resultado += "Líneas de Factura:\n";
        this.lineas.forEach((linea, index) => {
            resultado += `${index + 1}. ${linea.concepto} - Cantidad: ${linea.cantidad} - Precio Unitario: ${linea.precioUnitario} - Importe: ${linea.importe}\n`;
        });
        resultado += `\nImporte Total: ${this.importeTotal}`;
        return resultado;
    }

    agregarLinea(concepto, cantidad, precio) {
        const linea = new LineaFactura(concepto, cantidad, precio);
        this.lineas.push(linea);
    }

    eliminarLinea() {
        this.lineas.pop();
    }
}

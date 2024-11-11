// Utilidades.js
import { Factura } from './Factura.js';

export class Utilidades {
    static serializarFactura(facturaOBJ) {
        return JSON.stringify(facturaOBJ, null, 2);
    }

    static deserializarFactura(facturaJSON) {
        const obj = JSON.parse(facturaJSON);
        const factura = new Factura(obj.clienteNIF, obj.fecha, obj.hora, obj.pagada);
        obj.lineas.forEach(linea => factura.agregarLinea(linea.concepto, linea.cantidad, linea.precioUnitario));
        return factura;
    }
}

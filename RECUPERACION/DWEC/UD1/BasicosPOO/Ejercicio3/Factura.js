import Linea from "./Linea";

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

    imprimirFactura() {
        return `Factura de ${this.clienteNIF}\nFecha: ${this.fecha} ${this.hora}\nPagada: ${this.pagada ? 'Sí' : 'No'}\n` +
               `Líneas:\n${this.líneas.map(l => `- ${l.concepto}: ${l.cantidad} x ${l.precioUnitario}€`).join('\n')}\n` +
               `Total: ${this.importeTotal.toFixed(2)}€`;
    }

    agregarLinea(concepto, cantidad, precio){
        if (concepto && cantidad > 0 && precio > 0) {
            this.líneas.push(new Linea(concepto, cantidad, precio));
        }
    }

    eliminarLinea(){
        if(this.lineas.lenght > 0){
            this.lineas.pop();
        }
    }
}
export default Factura;
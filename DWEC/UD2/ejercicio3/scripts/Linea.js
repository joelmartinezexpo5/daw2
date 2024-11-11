// LineaFactura.js
export class LineaFactura {
    constructor(concepto, cantidad, precioUnitario) {
        this.concepto = concepto;
        this.cantidad = cantidad;
        this.precioUnitario = precioUnitario;
    }

    get importe() {
        return this.cantidad * this.precioUnitario;
    }
}

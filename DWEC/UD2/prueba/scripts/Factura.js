

class Linea {
    constructor(concepto, cantidad, precioUnitario) {
        this.concepto = concepto;
        this.cantidad = cantidad;
        this.precioUnitario = precioUnitario;
    }

    get importe() {
        return this.cantidad * this.precioUnitario;
    }
}

class Factura {
    constructor() {
        this.clienteNIF = '';
        this.fecha = '';
        this.hora = '';
        this.pagada = false;
        this.lineas = [];
    }

    get importeTotal() {
        return this.lineas.reduce((total, linea) => total + linea.importe, 0).toFixed(2);
    }

    get numeroArticulos() {
        return this.lineas.length;
    }

    agregarLinea(concepto, cantidad, precio) {
        this.lineas.push(new Linea(concepto, cantidad, precio));
        actualizarImpresion();
    }

    eliminarLinea() {
        this.lineas.pop();
        actualizarImpresion();
    }

    imprimirFactura() {
        let cabecera = `Factura de cliente NIF: ${this.clienteNIF}\nFecha: ${this.fecha} Hora: ${this.hora}\nEstado: ${this.pagada ? 'Pagada' : 'Pendiente'}\n`;
        let detalleLineas = this.lineas.map((linea, index) => `${index + 1}. ${linea.concepto} - Cantidad: ${linea.cantidad}, Precio Unitario: ${linea.precioUnitario.toFixed(2)}, Importe: ${linea.importe.toFixed(2)}`).join('\n');
        return `${cabecera}\nLíneas de Factura:\n${detalleLineas}\n\nTotal de artículos: ${this.numeroArticulos}\nImporte Total: ${this.importeTotal}`;
    }
}

class Utilidades {
    static serializarFactura(facturaOBJ) {
        return JSON.stringify(facturaOBJ, null, 2);
    }

    static deserializarFactura(facturaJSON) {
        let obj = JSON.parse(facturaJSON);
        let factura = new Factura();
        factura.clienteNIF = obj.clienteNIF;
        factura.fecha = obj.fecha;
        factura.hora = obj.hora;
        factura.pagada = obj.pagada;
        factura.lineas = obj.lineas.map(linea => new Linea(linea.concepto, linea.cantidad, linea.precioUnitario));
        return factura;
    }
}

let facturaActual = new Factura();

function actualizarFactura() {
    facturaActual.clienteNIF = document.getElementById('clienteNIF').value;
    facturaActual.fecha = document.getElementById('fecha').value;
    facturaActual.hora = document.getElementById('hora').value;
    facturaActual.pagada = document.getElementById('pagada').checked;
    actualizarImpresion();
}

function agregarLinea() {
    let concepto = document.getElementById('concepto').value;
    let cantidad = parseInt(document.getElementById('cantidad').value);
    let precio = parseFloat(document.getElementById('precio').value);
    if (concepto && cantidad > 0 && precio >= 0) {
        facturaActual.agregarLinea(concepto, cantidad, precio);
        document.getElementById('concepto').value = '';
        document.getElementById('cantidad').value = '';
        document.getElementById('precio').value = '';
    }
}

function eliminarLinea() {
    facturaActual.eliminarLinea();
}

function serializarFactura() {
    document.getElementById('salida').value = Utilidades.serializarFactura(facturaActual);
}

function deserializarFactura() {
    try {
        facturaActual = Utilidades.deserializarFactura(document.getElementById('entrada').value);
        actualizarImpresion();
    } catch (error) {
        alert("JSON inválido.");
    }
}

function actualizarImpresion() {
    document.getElementById('facturaImpresion').textContent = facturaActual.imprimirFactura();
}
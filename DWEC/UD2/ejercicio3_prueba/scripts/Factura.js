/**
 * Ejercicio 3.La estructura básica de una “Factura” se compone de:
 * Campos: •“clienteNIF”.•“fecha”, fechasin la hora.•“hora”, fecha sólo con la hora y minutos.
 * •“pagada”,booleano.•“líneas” (lista), colección de detalles de la factura.Propiedades: 
 * •“importeTotal” (get), devuelve el importe agregado de las líneas de factura.•“numeroArticulos” (get), 
 * devuelve el número de líneas de factura.Métodos: •“imprimirFactura()”, devuelve una cadena formateada 
 * con la información de la factura, cabecera con los datos básicos y la lista con las líneas de la factura.
 * •“agregarLinea(concepto, cantidad, precio)”, añade una nueva línea al final de “líneas”.•“eliminarLínea()”, 
 * elimina la última línea de “líneas”.La estructura “Línea” de factura se compone de:Campos:•“concepto”•“cantidad”, 
 * entero.•“precioUnitario”, real.Clase “Utilidades”, se compone de:Métodos:•“serializarFactura(facturaOBJ)”, 
 * estático, recibe un objeto de tipo Factura y devuelve la cadena JSON serializada.•“deserializararFactura(facturaJSON)”, 
 * estático, recibe una cadena JSON y devuelve el objeto Factura equivalente.Se pide:Crea un formulario en el que 
 * poder probar lo anterior, su estructura será la siguiente.Un formulario para introducir “clienteNIF”, 
 * “fecha”, “hora” y “pagada”, con un botón “Actualizar” que guarde el valor de los campos en la factura.Un formulario 
 * para gestionar las líneas de factura, contará con los campos “concepto”, “cantidad” y “precio”, y los botones correspondientes 
 * para agregar línea y para eliminar línea.Un formulario para gestionar la serialización y deserialización. 
 * Incluirá campo dos campos de texto, “entrada” para indicar una cadena JSON de entrada. Y “salida” para devolver el objeto 
 * factura serializado en formato JSON. Y los botones correspondientes para lanzar estás funcionalidades.
 * Un bloque “impresión” en el que se imprimirá la factura. El contenido se actualizará al modificarse algún 
 * elemento de factura (es decir, al pulsar alguno de los botones definidos previamente).No seas cutre, 
 * da un maquetado y formato mínimos al formulario,NOTA:te recuerdo que JSON.parse() tiene un tercer parámetromuy útil.
 */

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
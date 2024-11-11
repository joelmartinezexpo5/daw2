// app.js
import { Factura } from './Factura.js';
import { Utilidades } from './Utilidades.js';

let factura = new Factura('', '', '', false);

function actualizarFactura() {
    const clienteNIF = document.getElementById('clienteNIF').value;
    const fecha = document.getElementById('fecha').value;
    const hora = document.getElementById('hora').value;
    const pagada = document.getElementById('pagada').checked;
    factura = new Factura(clienteNIF, fecha, hora, pagada);
    actualizarImpresion();
}

function agregarLinea() {
    const concepto = document.getElementById('concepto').value;
    const cantidad = parseInt(document.getElementById('cantidad').value);
    const precio = parseFloat(document.getElementById('precio').value);
    factura.agregarLinea(concepto, cantidad, precio);
    actualizarImpresion();
}

function eliminarLinea() {
    factura.eliminarLinea();
    actualizarImpresion();
}

function serializarFactura() {
    const salida = Utilidades.serializarFactura(factura);
    document.getElementById('salida').value = salida;
}

function deserializarFactura() {
    const entrada = document.getElementById('entrada').value;
    factura = Utilidades.deserializarFactura(entrada);
    actualizarImpresion();
}

function actualizarImpresion() {
    document.getElementById('impresion').textContent = factura.imprimirFactura();
}

// Asignar eventos a los botones después de que el DOM se haya cargado
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('btnActualizarFactura').addEventListener('click', actualizarFactura);
    document.getElementById('btnAgregarLinea').addEventListener('click', agregarLinea);
    document.getElementById('btnEliminarLinea').addEventListener('click', eliminarLinea);
    document.getElementById('btnSerializarFactura').addEventListener('click', serializarFactura);
    document.getElementById('btnDeserializarFactura').addEventListener('click', deserializarFactura);
});

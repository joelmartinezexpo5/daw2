// main.js
import { Factura } from './Factura.js';
import { Utilidades } from './Utilidades.js';


let factura = new Factura();

window.addEventListener('load', function{
    const btnActualizar = document.getElementById('btnActualizar');

    btnActualizar.addEventListener('click', function () {
        factura.clienteNIF = document.getElementById('clienteNIF').value;
        factura.fecha = document.getElementById('fecha').value;
        factura.hora = document.getElementById('hora').value;
        factura.pagada = document.getElementById('pagada').checked;
        imprimirFactura();
    })
})


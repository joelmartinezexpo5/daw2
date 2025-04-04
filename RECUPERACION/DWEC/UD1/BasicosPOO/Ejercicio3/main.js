import Linea from "./Linea.js";
import Factura from "./Factura.js";
import { Utilidades, serializarFactura, deserializarFactura } from "./Utilidades.js";

const factura = new Factura();

document.getElementById('btnActualizar').addEventListener('click', function(){
    factura.clienteNIF = document.getElementById('clienteNIF').value;
    factura.fecha = document.getElementById('fecha').value;
    factura.hora = document.getElementById('hora').value;
    factura.pagada = document.getElementById('pagada').checked;
    
    console.log("Factura actualizada:", factura);
    document.getElementById('impresion').innerHTML = factura.imprimirFactura();
});

document.getElementById('btnAgregar').addEventListener('click', function(){
    let concepto = document.getElementById('concepto').value;
    let cantidad = parseInt(document.getElementById('cantidad').value);
    let precioUnitario = parseFloat(document.getElementById('precioUnitario').value);

    if(concepto && cantidad > 0 && precioUnitario > 0){
        factura.agregarLinea(concepto, cantidad, precioUnitario);
    }

    document.getElementById('impresion').innerHTML = factura.imprimirFactura();
})

document.getElementById('btnEliminar').addEventListener('click', function(){
    if(factura.lineas.length > 0){
        factura.eliminarLinea();

        document.getElementById('impresion').innerHTML = factura.imprimirFactura();
    }else{
        alert('No hay lineas para actualizar')
    }
})

document.getElementById('btnSerializar').addEventListener('click', function(){
    document.getElementById('salida').value = Utilidades.serializarFactura(factura);
})

document.getElementById('btnDeserializar').addEventListener('click', function(){
    let json = '';
    document.getElementById('entrada').value;
    factura = Utilidades.deserializarFactura(json);
    
    document.getElementById('impresion').innerHTML = factura.imprimirFactura();
})

